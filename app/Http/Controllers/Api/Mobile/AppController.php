<?php
namespace App\Http\Controllers\Api\Mobile;
use Auth;
use Hash;
use DB;
use URL;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Validator;

class AppController extends Controller
{
    public function getNumbers(Request $request)
    {

        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
            'dob' => 'required',
            // 'gender' => 'required',
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

        $dob = str_split($request->dob);
        // print_r($dob);exit;
        $a = $dob[2].$dob[3];
        $b = $dob[0].$dob[1];
        $c = $dob[6].$dob[7];
        $d = $dob[0] + $dob[1] + $dob[2] + $dob[3] + $dob[4] + $dob[5] + $dob[6] + $dob[7];

        $a = $this->check_single($a);
        $b = $this->check_single($b);
        $c = $this->check_single($c);
        $d = $this->check_single($d);


        $ar = array(
                    $this->check_value((int)$a),
                    $this->check_value((int)$b),
                    $this->check_value((int)$c),
                    $this->check_value($d),
                    $this->check_value($c - 2),
                    $this->check_value($d + 2),
                    $this->check_value($a - 2),
                    $this->check_value($b + 2),
                    $this->check_value($d + 1),
                    $this->check_value($c + 1),
                    $this->check_value($b - 1),
                    $this->check_value($a - 1),
                    $this->check_value($b + 1),
                    $this->check_value($a - 3),
                    $this->check_value($d + 3),
                    $this->check_value($c - 1),
                );



        //  print_r($ar);exit;
        return response()->json(['status' => true, 'data' => $ar]);
    }


    function check_value($number)
	{
	    if($number == 11 || $number == 22)
	    {
	        $final = $number;
	        return $final;
	    }
	     else{
		 $get_number = str_split($number);
         	$single = 0;
            if (count($get_number) > 1) {
                foreach ($get_number as $val) {
                    $single += $val;
                }
            } else {
                $single = $number;
            }
			$singleArray =   str_split($single);
			$final = 0 ;
			if (count($singleArray) > 1) {
                foreach ($singleArray as $val1) {
                    $final += $val1;
                }
            } else {
                $final = $single;
            }
			return $final;
	    }
	}


	function check_single($number)
	{
		 $get_number = str_split($number);
         	$single = 0;
            if (count($get_number) > 1) {
                foreach ($get_number as $val) {
                    $single += $val;
                }
            } else {
                $single = $number;
            }
			$singleArray =   str_split($single);
			$final = 0 ;
			if (count($singleArray) > 1) {
                foreach ($singleArray as $val1) {
                    $final += $val1;
                }
            } else {
                $final = $single;
            }
			return $final;
	}
    public function getNumberDetails(Request $request)
    {



        //print_r($request->all());
        $validator = Validator::make($request->all(), [
            'number' => 'required|numeric',
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


		$total_number = $request->number;
		$single_number = $this->check_single($request->number);
        $data = Numerology::where('number', $total_number)->orWhere('number', $single_number)->get();
        return response()->json(['status' => true, 'data' => $data, 'base_url' => url('/api/auth/') . '/']);

    }
}
