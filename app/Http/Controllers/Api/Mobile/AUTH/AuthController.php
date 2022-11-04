<?php
namespace App\Http\Controllers\Api\Mobile\AUTH;
use Validator;
use Auth;
use Hash;
use DB;
use Illuminate\Support\Str;
use App\User;
use App\VendorWallet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

use App\VendorForgotOtp;
use App\ForgotOtp;

class AuthController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Login User
     *
     * This endpoint lets you Login.
     * @unauthenticated
     *
     */

    public function sendSMS($template_id, $mobile_no, $text)
    {

        $url = "http://text.easy2approach.com/api/pushsms?user=xpertnet&authkey=92CM30pZrD6Xw&sender=EsyBdy&mobile={$mobile_no}&text=$text&rpt=1&summary=1&output=json&entityid=1201161954227670661&templateid=" . $template_id;

        $ch = curl_init();
        $timeout = 30;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response) {
            return true;
        } else {
            return false;
        }

    }

    public function sendResponse($result, $message)
    {
        $response = ['success' => true, 'message' => $message, 'data' => $result];
        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false, 'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

    protected function createNewToken($token){

        return response()->json([
            'status' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth()->guard('vendor')->factory()->getTTL() * 60,
            'data' => auth()->guard('vendor')->user(),
            'message'=>'Login Successfully'
        ]);

    }

    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'mobile' => 'required|numeric',
            'email' => 'required|string|email',
        ]);

        if ($validator->fails()) {
            $message = [];
            foreach ($validator->errors()->getMessages() as $keys => $vals) {
                foreach ($vals as $k => $v) {
                    $message[] = $v;
                }
            }
            return response()->json([
                'status' => false,
                'message' => $message[0],
            ]);
        }

        //sent otp code here

        $otp = 1234;//rand(10000, 99999);

        $user = User::where(function ($query) use ($request) {$query->where('mobile_no', $request->mobile);})->first();
        if (!$user) {
            $user = new User();
            $user->verify_otp_status = 0;
        }
        $user->name = $request->name;
        $user->mobile_no = $request->mobile;
        $user->device_token = $request->device_token;
        $user->email = $request->email;

        $user->status = 0;
        $user->device_key = $request->device_key;
        $user->register_otp = $otp;
        $user->save();

        // $text = "Dear+Customer,+Thanks+for+register+with+us.+OTP+for+your+mobile+number+verification+is+{$otp}+Thanks+EasyBuddy";
        // $this->sendSMS("1207162541723791759", $request->mobile, $text);

        return response()->json([
            'status' => true,
            'message' => 'Otp sent Successfully',
            'verify_otp_status' => $user->verify_otp_status,
            'mobile' => $user->mobile_no,
        ]);

    }

    public function Login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mobile' => 'required|numeric',
        ]);

        if ($validator->fails()) {

            $message = [];
            foreach ($validator->errors()->getMessages() as $keys => $vals) {

                foreach ($vals as $k => $v) {

                    $message[] = $v;

                }

            }

            return response()->json([
                'status' => false,
                'message' => $message[0],
            ]);
        }

        // $userCheck = User::where(function($query) use($request){
        //     $query->where('mobile', $request->mobile)->where('device_key',$request->device_key);
        // })
        // ->where('verify_otp_status', 1)->first();

        // if(!$userCheck){
        //       return response()->json(['status'=>false,'message'=>'You are already login on another device']);
        // }

        $user = User::where(function ($query) use ($request) {
            $query->where('mobile_no', $request->mobile);
        })
            ->where('verify_otp_status', 1)->first();

        if (!isset($user->id)) {

            $check = User::where(function ($query) use ($request) {
                $query->where('mobile_no', $request->mobile);
            })->first();

            if ($check) {
                if ($check->verify_otp_status == 0) {

                    $otp = 1234;//rand(10000, 99999);

                    $check->register_otp = $otp;
                    $check->save();

                    $text = "Dear+Customer,+Thanks+for+register+with+us.+OTP+for+your+mobile+number+verification+is+{$otp}+Thanks+EasyBuddy";
                    $this->sendSMS("1207162541723791759", $request->mobile, $text);

                    return response()->json(['status' => true, 'message' => 'Please verify now', 'verify_otp_status' => $check->verify_otp_status], 200);

                }
            }else {
                return response()->json(['status' => false, 'message' => 'User not exist'], 200);
            }

        }

        $otp = 1234;//rand(10000, 99999);

        $user->register_otp = $otp;
        $user->device_key = $request->device_key;
        $user->save();

        // $text = "Dear+Customer,+Thanks+for+register+with+us.+OTP+for+your+mobile+number+verification+is+{$otp}+Thanks+EasyBuddy";
        // $this->sendSMS("1207162541723791759", $request->mobile, $text);

        return response()->json(['status' => true, 'message' => 'Otp Sent Successfully','mobile' => $user->mobile_no,]);
    }

    public function otpVerify(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mobile' => 'required|numeric|exists:users,mobile_no',
            'otp' => 'required|numeric|digits:4',
        ]);
        if ($validator->fails()) {
            $message = [];
            foreach ($validator->errors()->getMessages() as $keys => $vals) {
                foreach ($vals as $k => $v) {
                    $message[] = $v;
                }
            }
            return response()->json([
                'status' => false,
                'message' => $message[0],
            ]);
        }

        $user = User::where('register_otp', $request->otp)->where('mobile_no', $request->mobile)->first();

        if ($user) {

            User::where('mobile_no', $request->mobile)->update([
                'verify_otp_status' => 1,
            ]);

            //$user = auth()->guard('api')->login($user);
            // return $this->createNewToken($users);
            $users = auth()->guard('vendor')->login($user);
            return $this->createNewToken($users);
        }
        return response()->json([
            'status' => false,
            'message' => 'Invalid Otp',
        ]);

    }

}
