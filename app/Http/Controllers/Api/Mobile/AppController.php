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
use App\DriverReport;
use App\ConductorReport;
use App\User;
use App\Reports;
use App\PunchLine;
use App\KarmicNumber;
use App\MissingNumber;
use App\RepeatNumber;
use App\Plan;
use App\BuySubscription;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class AppController extends Controller
{

    public function UpdateProfile(Request $request)
    {
       date_default_timezone_set('Asia/Kolkata');
       $user_id = Auth::guard('vendor')->user()->id;

        $validator = Validator::make($request->all(),[
             'email' => ['nullable', 'email',Rule::unique('users')->where(function ($query) use ($user_id) {
             return $query->where('id','!=',$user_id);
             })],

             'mobile_no' => ['nullable','numeric',Rule::unique('users')->where(function ($query) use ($user_id) {
                return $query->where('id','!=',$user_id);
             })],
        ]);

		if ($validator->fails())
		{
			$message = [];
			foreach($validator->errors()->getMessages() as $keys=>$vals)
			{
    			foreach($vals as $k=>$v)
    			{
    				$message[] =  $v;
    			}
			}

			return response()->json([
				'status' => false,
				'message' => $message[0]
				]);
		}

		$user = User::find($user_id);
        if($request->name)
		{
            $user->name = $request->name;
        }
        if($request->email)
		{
		    $user->email = $request->email;
        }
        if($request->business_name)
		{
		    $user->business_name = $request->business_name;
        }
        if($request->referal_code)
		{
            $user->referal_code = $request->referal_code;
        }
        if($request->address)
		{
            $user->address = $request->address;
        }

        if ($request->hasFile('business_logo')) {
            $image = 'user_' . time() . '.' . $request->business_logo->extension();
            $request->business_logo->move(public_path('uploads/users'), $image);
            $image = "/uploads/users/" . $image;
            $user->business_logo = $image;
        }


        // if ($request->hasFile('image')) {
        //     $image = 'user_' . time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('uploads/users'), $image);
        //     $image = "/uploads/users/" . $image;
        //     $user->profile_image = $image;
        // }
        if($request->mobile_no)
		{
            $user->mobile_no = $request->mobile_no;
        }
		$user->save();


		return response()->json(['status' => true,'message' => 'Profile updated successfully','data'=>$user]);

    }


    public function getNumbers(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'mobile' => 'required|numeric|digits:10',
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
        $driver = $dob[0].$dob[1];
        $driver = $this->check_single($driver);
        $conductor = $dob[0] + $dob[1] + $dob[2] + $dob[3] + $dob[4] + $dob[5] + $dob[6] + $dob[7];
        // print_r($conductor);exit;
        $conductor = $this->check_single($conductor);
        $kuwa_no = $dob[4] + $dob[5] + $dob[6] + $dob[7];
        $kuwa_no = $this->check_single($kuwa_no);

        if($request->gender == 'Male')
        {
            $kuwa_no = 11 - $kuwa_no;
            $kuwa_no = $this->check_single($kuwa_no);
        }
        else{
            $kuwa_no = $kuwa_no + 4;
            $kuwa_no = $this->check_single($kuwa_no);
        }
        // print_r($kuwa_no);exit;
        $mobile = 0;
        $mobile_arr = str_split($request->mobile);
        foreach($mobile_arr as $key=>$val)
        {
            $mobile += $val;
        }

        $mobile_number = $mobile;

        $mobile = $this->check_single($mobile);
        $currentyear = str_split(date("Y"));
        $dob = str_split($request->dob);

        $personalyear = $dob[0] + $dob[1] + $dob[2] + $dob[3] +$currentyear[0] + $currentyear[1] + $currentyear[2] + $currentyear[3];
        $personalyear = $this->check_single($personalyear);




        $currentmonth = date("m");

        $personalmonth = $personalyear + $currentmonth;
        $personalmonth = $this->check_single($personalmonth);


        $enemy = ['8','4,6,8,9','6','2,9,4,8','0','3,9','0','1,2,4,8,9','2,4,6,8,9'];
        $friend = ['1,2,3,4,5,6,7,9','1,2,3,5,7','1,2,3,4,5,7,8,9','1,3,5,6,7','1,2,3,4,5,6,7,8,9','1,2,4,5,6,7,8','1,2,3,4,5,6,7,8,9','3,5,6,7','1,3,5,7'];

        $conductor_enemy = 0;
        $driver_enemy = 0;
        foreach($enemy as $key=>$val)
        {
            if($conductor == $key + 1)
            {
                $conductor_enemy = $val;
            }

            if($driver == $key + 1)
            {
                $driver_enemy = $val;
            }
        }

        $avoid_no = $conductor_enemy.','.$driver_enemy;
        $avoid_no = implode(',',array_unique(explode(',', $avoid_no)));

        $arr1 = explode(',', $avoid_no);
        $arr2 = range(1,9);
        $lucky_friend_no = array_diff($arr2,$arr1);

        $lucky_no = array();
        $friend_no = array();
        foreach($lucky_friend_no as $key=>$val)
        {
            if($val == 1)
            {
                $lucky_no[] = $val;
            }
            elseif($val == 5)
            {
                $lucky_no[] = $val;
            }
            elseif($val == 6)
            {
                $lucky_no[] = $val;
            }
            else{
                $friend_no[] = $val;
            }
        }

        $lucky_no = implode(',',$lucky_no);
        $friend_no = implode(',',$friend_no);


        $date = $dob[0].$dob[1];
        $datematch = ['1','2','3','4','5','6','7','8','9','10','20','30'];
        $out = '';
        foreach($datematch as $key=>$val)
        {
            if($val == $date)
            {
                $out = 't';
            }

        }

        if($out != null)
        {
            $value = str_split($request->dob.$conductor.$kuwa_no);
        }
        else
        {
            $value = str_split($request->dob.$driver.$conductor.$kuwa_no);
        }



        $present = array();
        $notpresent = array();

        $getdata = array();
        $nodata = array();
        $freqs = array_count_values($value);

        $freq_4 = isset($freqs['4'])?$freqs['4']:0;
        $freq_9 = isset($freqs['9'])?$freqs['9']:0;
        $freq_2 = isset($freqs['2'])?$freqs['2']:0;
        $freq_3 = isset($freqs['3'])?$freqs['3']:0;
        $freq_5 = isset($freqs['5'])?$freqs['5']:0;
        $freq_7 = isset($freqs['7'])?$freqs['7']:0;
        $freq_8 = isset($freqs['8'])?$freqs['8']:0;
        $freq_1 = isset($freqs['1'])?$freqs['1']:0;
        $freq_6 = isset($freqs['6'])?$freqs['6']:0;


        if($freq_4 == 0)
        {
            $notpresent[] = 4;
            $nodata[] = '4';
        }
        else{
            $present[] = 4;
            $getdata[] = $freq_4.' time 4';
        }
        if($freq_9 == 0)
        {
            $notpresent[] = 9;
            $nodata[] = '9';
        }
        else{
            $present[] = 9;
            $getdata[] = $freq_9.' time 9';
        }
        if($freq_2 == 0)
        {
            $notpresent[] = 2;
            $nodata[] = '2';
        }
        else{
            $present[] = 2;
            $getdata[] = $freq_2.' time 2';
        }
        if($freq_3 == 0)
        {
            $notpresent[] = 3;
            $nodata[] = '3';

        }
        else{
            $present[] = 3;
            $getdata[] = $freq_3.' time 3';
        }
        if($freq_5 == 0)
        {
            $notpresent[] = 5;
            $nodata[] = '5';
        }
        else{
            $present[] = 5;
            $getdata[] = $freq_5.' time 5';
        }
        if($freq_7 == 0)
        {
            $notpresent[] = 7;
            $nodata[] = '4';
        }
        else{
            $present[] = 7;
            $getdata[] = $freq_7.' time 7';
        }
        if($freq_8 == 0)
        {
            $notpresent[] = 8;
            $nodata[] = '8';
        }
        else{
            $present[] = 8;
            $getdata[] = $freq_8.' time 8';
        }
        if($freq_1 == 0)
        {
            $notpresent[] = 1;
            $nodata[] = '1';
        }
        else{
            $present[] = 1;
            $getdata[] = $freq_1.' time 1';
        }
        if($freq_6 == 0)
        {
            $notpresent[] = 6;
            $nodata[] = '6';
        }
        else{
            $present[] = 6;
            $getdata[] = $freq_6.' time 6';
        }

        $valuearray = array(
            $freq_4,
            $freq_9,
            $freq_2,
            $freq_3,
            $freq_5,
            $freq_7,
            $freq_8,
            $freq_1,
            $freq_6,
        );

        $thought = $this->check_percent($valuearray[0].$valuearray[3].$valuearray[6]);
        $will = $this->check_percent($valuearray[1].$valuearray[4].$valuearray[7]);
        $action = $this->check_percent($valuearray[2].$valuearray[5].$valuearray[8]);
        $mental = $this->check_percent($valuearray[0].$valuearray[1].$valuearray[2]);
        $emotional = $this->check_percent($valuearray[3].$valuearray[4].$valuearray[5]);
        $practical = $this->check_percent($valuearray[6].$valuearray[7].$valuearray[8]);
        $success1 = $this->check_percent($valuearray[0].$valuearray[4].$valuearray[8]);
        $success2 = $this->check_percent($valuearray[2].$valuearray[4].$valuearray[6]);


        $plan = array();
        $plan['thought'] = $thought;
        $plan['will'] = $will;
        $plan['action'] = $action;
        $plan['mental'] = $mental;
        $plan['emotional'] = $emotional;
        $plan['practical'] = $practical;
        $plan['success1'] = $success1;
        $plan['success2'] = $success2;



        $strength = array();
        foreach($getdata as $key=>$val)
        {
            $strength[] = DB::table('strength_remedies')->where('counts',$val)->first();
        }

        // $remedie = array();
        // foreach($nodata as $key=>$val)
        // {
        //     $remedie[] = DB::table('strength_remedies')->where('counts',$val)->first();
        // }

        // print_r($strength);exit;
        $ar = array('A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5, 'F' => 8, 'G' => 3, 'H' => 5, 'I' => 1, 'J' => 1, 'K' => 2, 'L' => 3, 'M' => 4, 'N' => 5, 'O' => 7,
        'P' => 8, 'Q' => 1, 'R' => 2, 'S' => 3, 'T' => 4, 'U' => 6, 'V' => 6, 'W' => 6, 'X' => 5, 'Y' => 1, 'Z' => 7);

        $name = str_replace(' ', '', $request->name);
        $nameArray = str_split(strtoupper($name));

        $total = 0;
        $name_no = 0;
        $data = [];
        foreach ($nameArray as $name) {
            $total += $ar[$name];
        }

        if($request->personal_date)
        {
            $personal_date = str_split($request->personal_date);
            $personal_date = $personal_date[0] + $personal_date[1] + $personal_date[2] + $personal_date[3]
                            + $personal_date[4] + $personal_date[5] + $personal_date[6] + $personal_date[7]
                            + $personalmonth + $personalyear;
            $personal_date = $this->check_single($personal_date);
            // print_r($personal_date);exit;
        }
        else{
            $personal_date = 0;
        }


        $name_no = $this->check_single($total);
        $data['name_total'] = $total;
        $data['name_no'] = $name_no;
		$data['driver'] = $driver;
        $data['conductor'] = $conductor;
        $data['kuwa_no'] = $kuwa_no;
        $data['mobile_total'] = $mobile_number;
        $data['mobile'] = $mobile;
        // $data['personalyear'] = $personalyear;
        // $data['personalmonth'] = $personalmonth;
        // $data['personal_date'] = $personal_date;
        // $data['avoid_no'] = $avoid_no;
        $data['lucky_no'] = $lucky_no;
        // $data['friend_no'] = $friend_no;
        $data['present'] = $present;
        $data['missing'] = $notpresent;
        $data['value'] = $value;
        $data['calculation'] = $valuearray;
        // $data['strength'] = $strength;
        $obj = json_decode(json_encode($data), false);

        $planobj = json_decode(json_encode($plan), false);
        return response()->json(['status' => true, 'data' => $obj
        // , 'plane' =>$planobj
        ]);
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



	function check_percent($number)
	{
        $checkplanno = array();
		 $get_number = str_split($number);
            if($get_number[0] != 0)
            {
                $checkplanno[] = $get_number[0];
                $final = 33;
            }
            else{
                $final = 0;
            }
            if($get_number[1] != 0)
            {
                $checkplanno[] = $get_number[1];
                $final = $final + 33;
            }
            if($get_number[2] != 0)
            {
                $checkplanno[] = $get_number[2];
                $final = $final + 34;
            }

            $checkplanno = implode(',',$checkplanno);

            $plancount = implode(',',$get_number);
            $data['final'] = $final;
            $data['checkplanno'] = $checkplanno;
            $data['plancount'] = $plancount;
			return $data;
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


    public function getReports(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'mobile' => 'required|numeric|digits:10',
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

        if(auth()->guard('vendor')->user())
        {

            $user = auth()->guard('vendor')->user();
            $today = date('Y-m-d');
            if($user->no_of_reports > 0 && $user->end_date >= $today)
            {

                $dob = str_split($request->dob);
                $driver = $dob[0].$dob[1];
                $driver = $this->check_single($driver);
                $conductor = $dob[0] + $dob[1] + $dob[2] + $dob[3] + $dob[4] + $dob[5] + $dob[6] + $dob[7];
                $requesteddate = $dob[0].$dob[1].'-'.$dob[2].$dob[3].'-'.$dob[4].$dob[5].$dob[6].$dob[7];
                // print_r($conductor);exit;
                $conductor = $this->check_single($conductor);
                $kuwa_no = $dob[4] + $dob[5] + $dob[6] + $dob[7];
                $kuwa_no = $this->check_single($kuwa_no);

                if($request->gender == 'Male')
                {
                    $kuwa_no = 11 - $kuwa_no;
                    $kuwa_no = $this->check_single($kuwa_no);
                }
                else{
                    $kuwa_no = $kuwa_no + 4;
                    $kuwa_no = $this->check_single($kuwa_no);
                }
                //// negative number in mobile no /////
                $mobile = 0;
                $negative_num = array();
                $mobile_arr = str_split($request->mobile);
                foreach($mobile_arr as $key=>$val)
                {
                    $mobile += $val;
                    if($val == 2)
                    {
                       $negative_num[] = 2;
                    }
                    elseif($val == 4)
                    {
                       $negative_num[] = 4;
                    }
                    elseif($val == 8)
                    {
                       $negative_num[] = 8;
                    }

                }

                $negative_num = implode(',',array_unique($negative_num));

                ///// mobile no report /////

                $mobile_number = $mobile;

                $mobile = $this->check_single($mobile);

                $contains = Str::contains($request->mobile, ['111', '555', '333' , '666']);
                if($mobile == 6 || $mobile == 1 || $mobile == 5)
                {
                    $d = 'Congratulations you have the best mobile number sum result';
                }
                else{
                    $d = "";
                }

                if($negative_num != null)
                {
                    $e = 'Negative number in your mobile number:-';
                    $f = $negative_num;
                }
                else{
                    $e = "";
                    $f = "";
                }

                if($contains != null)
                {
                    $g = 'Pairs of three(111, 555, 333, 666)';
                    $h = 'You have triplets of 1,3,5,6';
                }
                else{
                    $g = 'Pairs of three(111, 555, 333, 666)';
                    $h = 'You have no triplets of 1,3,5,6';
                }

                $mobile_report = [
                    "A"=>'Mobile Number : '.$request->mobile,
                    "B"=>'Your mobile number sum is : '.$mobile_number.'/'.$mobile,
                    "c"=>'The best mobile number sum result is 5 then 6 or 1.',
                    "d"=> $d,
                    "e"=> $e,
                    "f"=> $f,
                    "g"=> $g,
                    "h"=> $h,
                ];

                $currentyear = str_split(date("Y"));
                $dob = str_split($request->dob);

                //// caluclate personal year of current year///

                $personalyear = $dob[0] + $dob[1] + $dob[2] + $dob[3] +$currentyear[0] + $currentyear[1] + $currentyear[2] + $currentyear[3];
                $personalyear = $this->check_single($personalyear);


                /// get personal years of next 8 year //////
                $nextpersonalyears = array();
                for ($i = 0; $i <= 8; $i++) {
                    $year = Carbon::today()->addYear($i)->format('Y');
                    $nowyear = $year;

                    $year = str_split($year);
                    $personalyearnew = $dob[0] + $dob[1] + $dob[2] + $dob[3] +$year[0] + $year[1] + $year[2] + $year[3];
                    $personalyearnew = $this->check_single($personalyearnew);

                    array_push($nextpersonalyears, array(
                        'year_no' => $personalyearnew,
                        'year' => $nowyear
                    ));
                }

                //// calculate personal month //////
                $currentmonth = date("m");


                $nextpersonalmonth = array();
                for ($i = 0; $i <= 11; $i++) {

                    ////// get months name and number ///

                    $month = Carbon::today()->addMonth($i)->format('m');
                    $nowmonth = Carbon::today()->addMonth($i)->format('M');

                    //// calculate personal year first ////

                    $year = Carbon::today()->addMonth($i)->format('Y');
                    $nowpersonalyear = $dob[0] + $dob[1] + $dob[2] + $dob[3] +$year[0] + $year[1] + $year[2] + $year[3];
                    $nowpersonalyear = $this->check_single($nowpersonalyear);


                    $month = str_split($month);
                    $personalmonthnew = $nowpersonalyear + $month[0]+ $month[1];
                    $personalmonthnew = $this->check_single($personalmonthnew);
                    array_push($nextpersonalmonth, array(
                        'month_no' => $personalmonthnew,
                        'month' => $nowmonth
                    ));
                }


                // print_r($nextpersonalmonth);exit;

                $personalmonth = $personalyear + $currentmonth;
                $personalmonth = $this->check_single($personalmonth);

                ///// put static enemy and friend numbers  opposite nos and friend nos ////

                $enemy = ['8','4,6,8,9','6','2,9,4,8','0','3,9','0','1,2,4,8,9','2,4,6,8,9'];
                $friend = ['1,2,3,4,5,6,7,9','1,2,3,5,7','1,2,3,4,5,7,8,9','1,3,5,6,7','1,2,3,4,5,6,7,8,9','1,2,4,5,6,7,8','1,2,3,4,5,6,7,8,9','3,5,6,7','1,3,5,7'];

                /// calculate enemy and friend behalf of conductor and driver no//////
                $conductor_enemy = 0;
                $driver_enemy = 0;
                foreach($enemy as $key=>$val)
                {
                    if($conductor == $key + 1)
                    {
                        $conductor_enemy = $val;
                    }

                    if($driver == $key + 1)
                    {
                        $driver_enemy = $val;
                    }
                }

                //// calculate avoid no , lucky no , friend no /////
                $avoid_no = $conductor_enemy.','.$driver_enemy;
                $avoid_no = implode(',',array_unique(explode(',', $avoid_no)));

                $arr1 = explode(',', $avoid_no);
                $arr2 = range(1,9);
                $lucky_friend_no = array_diff($arr2,$arr1);

                $lucky_no = array();
                $friend_no = array();
                foreach($lucky_friend_no as $key=>$val)
                {
                    if($val == 1)
                    {
                        $lucky_no[] = $val;
                    }
                    elseif($val == 5)
                    {
                        $lucky_no[] = $val;
                    }
                    elseif($val == 6)
                    {
                        $lucky_no[] = $val;
                    }
                    else{
                        $friend_no[] = $val;
                    }
                }

                $lucky_no = implode(',',$lucky_no);
                $friend_no = implode(',',$friend_no);

                ////// avoid and lucky colors //////
                $avoid_colors = array();
                foreach($arr1 as $key=>$val)
                {
                    if($val != 0)
                    {
                        $avoid_colors[] = DB::table('avoid_colors')->where('number',$val)->first()->colors;
                    }
                }

                $lucky_colors = array();
                foreach($lucky_friend_no as $key=>$val)
                {
                    if($val != 0)
                    {
                        $lucky_colors[] = DB::table('lucky_colors')->where('number',$val)->first()->colors;
                    }
                }

                //// for converting in string ////
                $pdfavoid_colors = $avoid_colors;
                $avoid_colors = implode(', ',array_unique($avoid_colors));
                // $lucky_colors = implode(', ',array_unique($lucky_colors));


                ////// avoid and lucky proffession //////

                $avoid_proffession = array();
                foreach($arr1 as $key=>$val)
                {
                    if($val != 0)
                    {
                        if($request->gender == 'Male')
                        {
                            $avoid_proffession[] = DB::table('proffession')->where('number',$val)->select('id','number','detail as english_detail','detail_hindi')->first();
                        }
                        else
                        {
                            $avoid_proffession[] = DB::table('proffession')->where('number',$val)->select('id','number','detail_female as english_detail','detail_female_hindi as detail_hindi')->first();
                        }
                    }
                }

                $lucky_proffession = array();
                foreach($lucky_friend_no as $key=>$val)
                {
                    if($val != 0)
                    {
                        if($request->gender == 'Male')
                        {
                            $lucky_proffession[] = DB::table('proffession')->where('number',$val)->select('id','number','detail as english_detail','detail_hindi')->first();
                        }
                        else
                        {
                            $lucky_proffession[] = DB::table('proffession')->where('number',$val)->select('id','number','detail_female as english_detail','detail_female_hindi as detail_hindi')->first();
                        }
                    }
                }


                //// avoid and lucky days /////

                $avoid_days = array();
                foreach($arr1 as $key=>$val)
                {
                    if($val != 0)
                    {
                        $avoid_days[] = DB::table('lucky_days')->where('number',$val)->select('id','number','days')->first()->days;
                    }
                }


                $for_sunday = Str::contains($avoid_no, ['1', '4']);
                $for_monday = Str::contains($avoid_no, ['2', '7']);

                $newavoid = $arr1;
                if($for_sunday == 1)
                {
                    $newavoid[] = '1';
                    $newavoid[] = '4';
                }
                if($for_monday == 1)
                {
                    $newavoid[] = '2';
                    $newavoid[] = '7';
                }

                $arr2 = range(1,9);
                $new_lucky = array_diff($arr2,$newavoid);

               // print_r($new_lucky);
                $lucky_days = array();
                foreach($new_lucky as $key=>$val)
                {
                    if($val != 0)
                    {
                        $lucky_days[] = DB::table('lucky_days')->where('number',$val)->select('days')->first()->days;

                    }
                }

                $pdfavoid_days = $avoid_days;
                $pdflucky_days = $lucky_days;
                $avoid_days = implode(', ',array_unique($avoid_days));
                $lucky_days = implode(', ',array_unique($lucky_days));


               // print_r($lucky_days);

                $date = $dob[0].$dob[1];
                $datematch = ['1','2','3','4','5','6','7','8','9','10','20','30'];
                $out = '';
                foreach($datematch as $key=>$val)
                {
                    if($val == $date)
                    {
                        $out = 't';
                    }

                }

                if($out != null)
                {
                    $value = str_split($request->dob.$conductor.$kuwa_no);
                }
                else
                {
                    $value = str_split($request->dob.$driver.$conductor.$kuwa_no);
                }



                $present = array();
                $notpresent = array();

                $getdata = array();
                $repeatd = array();
                $single_no = array();
                $nodata = array();
                $freqs = array_count_values($value);
                // print_r($freqs);exit;
                $keyvalue = 'freq_';
                foreach($freqs as $key=>$val)
                {
                    if($key == $kuwa_no)
                    {
                        $keyvalue = '$freq_'.$key;
                    }
                }

                $freq_4 = isset($freqs['4'])?$freqs['4']:0;
                $freq_9 = isset($freqs['9'])?$freqs['9']:0;
                $freq_2 = isset($freqs['2'])?$freqs['2']:0;
                $freq_3 = isset($freqs['3'])?$freqs['3']:0;
                $freq_5 = isset($freqs['5'])?$freqs['5']:0;
                $freq_7 = isset($freqs['7'])?$freqs['7']:0;
                $freq_8 = isset($freqs['8'])?$freqs['8']:0;
                $freq_1 = isset($freqs['1'])?$freqs['1']:0;
                $freq_6 = isset($freqs['6'])?$freqs['6']:0;


                if($freq_4 == 0)
                {
                    $notpresent[] = 4;
                    $nodata[] = '4';
                }
                else{
                    $present[] = 4;
                    $getdata[] = $freq_4.' time 4';

                    if($freq_4 >1 && $kuwa_no != 4)
                    {
                        $repeatd[] = $freq_4.' time 4';
                    }
                    else{
                        $single_no[] = $freq_4.' time 4';
                    }
                }
                if($freq_9 == 0)
                {
                    $notpresent[] = 9;
                    $nodata[] = '9';
                }
                else{
                    $present[] = 9;
                    $getdata[] = $freq_9.' time 9';
                    if($freq_9 >1  && $kuwa_no != 9)
                    {
                        $repeatd[] = $freq_9.' time 9';
                    }
                    else{
                        $single_no[] = $freq_9.' time 9';
                    }
                }
                if($freq_2 == 0)
                {
                    $notpresent[] = 2;
                    $nodata[] = '2';
                }
                else{
                    $present[] = 2;
                    $getdata[] = $freq_2.' time 2';
                    if($freq_2 >1  && $kuwa_no != 2)
                    {
                        $repeatd[] = $freq_2.' time 2';
                    }
                    else{
                        $single_no[] = $freq_2.' time 2';
                    }
                }
                if($freq_3 == 0)
                {
                    $notpresent[] = 3;
                    $nodata[] = '3';

                }
                else{
                    $present[] = 3;
                    $getdata[] = $freq_3.' time 3';
                    if($freq_3 >1  && $kuwa_no != 3)
                    {
                        $repeatd[] = $freq_3.' time 3';
                    }
                    else{
                        $single_no[] = $freq_3.' time 3';
                    }
                }
                if($freq_5 == 0)
                {
                    $notpresent[] = 5;
                    $nodata[] = '5';
                }
                else{
                    $present[] = 5;
                    $getdata[] = $freq_5.' time 5';
                    if($freq_5 >1 && $kuwa_no != 5)
                    {
                        $repeatd[] = $freq_5.' time 5';
                    }
                    else{
                        $single_no[] = $freq_5.' time 5';
                    }
                }
                if($freq_7 == 0)
                {
                    $notpresent[] = 7;
                    $nodata[] = '4';
                }
                else{
                    $present[] = 7;
                    $getdata[] = $freq_7.' time 7';
                    if($freq_7 >1 && $kuwa_no != 7)
                    {
                        $repeatd[] = $freq_7.' time 7';
                    }
                    else{
                        $single_no[] = $freq_7.' time 7';
                    }
                }
                if($freq_8 == 0)
                {
                    $notpresent[] = 8;
                    $nodata[] = '8';
                }
                else{
                    $present[] = 8;
                    $getdata[] = $freq_8.' time 8';
                    if($freq_8 >1 && $kuwa_no != 8)
                    {
                        $repeatd[] = $freq_8.' time 8';
                    }
                    else{
                        $single_no[] = $freq_8.' time 8';
                    }
                }
                if($freq_1 == 0)
                {
                    $notpresent[] = 1;
                    $nodata[] = '1';
                }
                else{
                    $present[] = 1;
                    $getdata[] = $freq_1.' time 1';
                    if($freq_1 >1 && $kuwa_no != 1)
                    {
                        $repeatd[] = $freq_1.' time 1';
                    }
                    else{
                        $single_no[] = $freq_1.' time 1';
                    }
                }
                if($freq_6 == 0)
                {
                    $notpresent[] = 6;
                    $nodata[] = '6';
                }
                else{
                    $present[] = 6;
                    $getdata[] = $freq_6.' time 6';
                    if($freq_6 >1 && $kuwa_no != 6)
                    {
                        $repeatd[] = $freq_6.' time 6';
                    }
                    else{
                        $single_no[] = $freq_6.' time 6';
                    }
                }

                $valuearray = array(
                    $freq_4,
                    $freq_9,
                    $freq_2,
                    $freq_3,
                    $freq_5,
                    $freq_7,
                    $freq_8,
                    $freq_1,
                    $freq_6,
                );

                /// get percentage of plane ///

                $thought = $this->check_percent($valuearray[0].$valuearray[3].$valuearray[6]);
                $will = $this->check_percent($valuearray[1].$valuearray[4].$valuearray[7]);
                $action = $this->check_percent($valuearray[2].$valuearray[5].$valuearray[8]);
                $mental = $this->check_percent($valuearray[0].$valuearray[1].$valuearray[2]);
                $emotional = $this->check_percent($valuearray[3].$valuearray[4].$valuearray[5]);
                $practical = $this->check_percent($valuearray[6].$valuearray[7].$valuearray[8]);
                $success1 = $this->check_percent($valuearray[0].$valuearray[4].$valuearray[8]);
                $success2 = $this->check_percent($valuearray[2].$valuearray[4].$valuearray[6]);


                $plan = array();
                $plan['thought'] = $thought['final'];
                $plan['will'] = $will['final'];
                $plan['action'] = $action['final'];
                $plan['mental'] = $mental['final'];
                $plan['emotional'] = $emotional['final'];
                $plan['practical'] = $practical['final'];
                $plan['success1'] = $success1['final'];
                $plan['success2'] = $success2['final'];

                /// get report of plane /////

                $planreport = array();
                $planreport['thought'] = 'As per your date of birth, your Thought plane (4-3-8) have numbers :: '.$thought['checkplanno'];
                $planreport['will'] = 'As per your date of birth, your WILL plane (9-5-1) have numbers :: '.$will['checkplanno'];
                $planreport['action'] = 'As per your date of birth, your Outlook/Action plane (2-7-6) have numbers :: '.$action['checkplanno'];
                $planreport['mental'] = 'As per your date of birth, your Mental plane (4-9-2) have numbers :: '.$mental['checkplanno'];
                $planreport['emotional'] = 'As per your date of birth, your Emotional plane have (3-5-7) numbers :: '.$emotional['checkplanno'];
                $planreport['practical'] = 'As per your date of birth, your Practical plane (8-1-6) have numbers :: '.$practical['checkplanno'];
                $planreport['success1'] = 'As per your date of birth, your Success Yoga 1 (4-5-6) have numbers :: '.$success1['checkplanno'];
                $planreport['success2'] = 'As per your date of birth, your WILL power (2-5-8) have numbers :: '.$success2['checkplanno'];


                $planreport['thought_description'] = '<p>4*3*8= Thought plane</p><p><br></p><p>Sharp memory, creativity, imagination power very strong, analysis,cleverness, think n give decesion,&nbsp;</p><p><br></p><p>Political row, shrewd/cunning, non ethical, very logical in life no behas at all with them.</p><p><br></p><p>Shiela dixshit 31.3.1938</p>';
                $planreport['will_description'] = '<p>9*5*1= Will plane&nbsp;</p><p><br></p><p>Will power very strong, gives determination, persistence to succeed, humanitarian nature, intellectual capabilities, success definitely milege life mein, hatyogi, santoshi, personality just like neelkanth mahadev.</p><p><br></p><p><br></p><p>Narender modi 17.9.1950</p>';
                $planreport['action_description'] = '<p>2*7*6=&nbsp; Action plane</p><p><br></p><p>This shows the person ability at putting his thoughts to action, they take very fast decesion and action, physical activity, always ready to run, sports person.</p><p><br></p><p><br></p><p>Pehle karte hain baad mein result k baare mein sochte hain.</p><p><br></p><p>Sachin tendulkar 24.4.1973</p>';
                $planreport['mental_description'] = '<p>4*9*2=&nbsp; Mental Plane</p><p><br></p><p>God gifted brain, execellent memory, creativity, imagination, intellectual class, cleverness, analysis, very logical, worring factor, good&nbsp; in studies especially science, think n give decessions.</p><p><br></p><p><br></p><p>Amitabh bachchan 11.10.1942</p>';
                $planreport['emotional_description'] = '<p>3*5*7 = Emotional Plane</p><p><br></p><p>Emotional fools, spirituality,feelings,love, romantic, big hearted, sentimental, dreamers, heart rules over the head,&nbsp; dil ke raja but dil par hi chot jaroor khate hai, over trust is the biggest problem in their life.</p><p><br></p><p><br></p><p>Malika arora 23.10.1973</p>';
                $planreport['practical_description'] = '<p>8*1*6=Practical plane</p><p><br></p><p>&nbsp;Arrow of business, always ready to walk, ek jagah tik nahin sakte, slow and steady wins the race, hard workers, remain grounded, physical labour, the ability to be good with his own experience, very practical in everyday life, good observer, always logical, brings wealth in life after hard work.</p><p><br></p><p><br></p><p>Mdkghandhi 2.10.1869</p>';
                $planreport['success1_description'] = '<p>4*5*6= best luck factor, will achieve every thing in life</p><p><br></p><p>Anil kapoor 2412 1956</p><p><br></p><p>Azim premji 24 07 1945</p><p><br></p><p>Sonia ghandhi 9/12/1946</p>';
                $planreport['success2_description'] = '<p>2*5*8 = property plane</p><p><br></p><p>Property maker, slow and steady wins the race</p><p><br></p><p>Dharmendra 8.12.1935</p>';


                $thoughtarray = $thought['plancount'];
                $thoughtarray = explode(',', $thoughtarray);

                $willarray = $will['plancount'];
                $willarray = explode(',', $willarray);

                $actionarray = $action['plancount'];
                $actionarray = explode(',', $actionarray);

                $mentalarray = $mental['plancount'];
                $mentalarray = explode(',', $mentalarray);

                $emotionalarray = $emotional['plancount'];
                $emotionalarray = explode(',', $emotionalarray);

                $practicalarray = $practical['plancount'];
                $practicalarray = explode(',', $practicalarray);

                $success1array = $success1['plancount'];
                $success1array = explode(',', $success1array);

                $success2array = $success2['plancount'];
                $success2array = explode(',', $success2array);

                ///// strength data //////

                $strength = array();
                foreach($getdata as $key=>$val)
                {
                    $strength[] = DB::table('strength_remedies')->where('counts',$val)->first();
                }

                $ar = array('A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5, 'F' => 8, 'G' => 3, 'H' => 5, 'I' => 1, 'J' => 1, 'K' => 2, 'L' => 3, 'M' => 4, 'N' => 5, 'O' => 7,
                'P' => 8, 'Q' => 1, 'R' => 2, 'S' => 3, 'T' => 4, 'U' => 6, 'V' => 6, 'W' => 6, 'X' => 5, 'Y' => 1, 'Z' => 7);

                $name = str_replace(' ', '', $request->name);
                $nameArray = str_split(strtoupper($name));

                $total = 0;
                $name_no = 0;
                $data = [];
                foreach ($nameArray as $name) {
                    $total += $ar[$name];
                }

                //////// calculate personal date /////
                if($request->personal_date)
                {

                    $personal_date = str_split($request->personal_date);
                    $personal_date = $personal_date[0] + $personal_date[1] + $personal_date[2] + $personal_date[3]
                                    + $personal_date[4] + $personal_date[5] + $personal_date[6] + $personal_date[7]
                                    + $personalmonth + $personalyear;
                    $personal_date = $this->check_single($personal_date);

                }
                else{
                    $personal_date = 0;
                }
                // print_r($personal_date);exit;

                ///// get driver , conductor and personal year report /////

                if($request->gender == 'Male')
                {
                    $driver_report = DriverReport::where('driver_no',$driver)->select('id','driver_no','description as description_english','description_hindi')->first();
                }
                else{
                    $driver_report = DriverReport::where('driver_no',$driver)->select('id','driver_no','description_female as description_english','description_hindi_female as description_hindi')->first();
                }

                if($request->gender == 'Male')
                {
                    $conductor_report = ConductorReport::where('conductor_no',$conductor)->select('id','conductor_no','description as description_english','description_hindi')->first();
                }
                else{
                    $conductor_report = ConductorReport::where('conductor_no',$conductor)->select('id','conductor_no','description_female as description_english','description_hindi_female as description_hindi')->first();
                }

                $personalyear_report = array();
                if($request->gender == 'Male')
                {
                    foreach($nextpersonalyears as $key=>$val)
                    {
                        // print_r($val);exit;
                        $personalyear_report[] = DB::table('personal_year')->where('number',$val['year_no'])->select('id','number','description as description_english','description_hindi')->first();
                        $personalyear_report[$key]->year = $val['year'];
                    }
                }
                else{
                    foreach($nextpersonalyears as $key=>$val)
                    {
                        $personalyear_report[] = DB::table('personal_year')->where('number',$val)->select('id','number','description_female as description_english','description_hindi_female as description_hindi')->first();
                        $personalyear_report[$key]->year = $val['year'];
                    }
                }


                //// get punch line and karmic no ////

                if($request->gender == 'Male')
                {
                    $punch_line = PunchLine::where('driver',$driver)->where('conductor',$conductor)->select('id','driver','conductor','line','line_hindi')->first();
                }
                else{
                    $punch_line = PunchLine::where('driver',$driver)->where('conductor',$conductor)->select('id','driver','conductor','line_female as line','line_hindi_female as line_hindi')->first();
                }

                if($request->gender == 'Male')
                {
                    $karmic_no = KarmicNumber::where('number',$date)->select('id','number','detail','detail_hindi')->first();
                }
                else{
                    $karmic_no = KarmicNumber::where('number',$date)->select('id','number','detail_female as detail','detail_hindi_female as detail_hindi')->first();
                }

                // $punch_line = PunchLine::where('driver',$driver)->where('conductor',$conductor)->first();
                // $karmic_no = KarmicNumber::where('number',$date)->first();

                // if($punch_line == null)
                // {
                //     $punch_line = " ";
                // }
                // else
                // {
                //     $punch_line = $punch_line->line;
                // }

                // if( $karmic_no == null)
                // {
                //     $karmic_no = "";
                // }
                // else{
                //     $karmic_no = $karmic_no->detail;
                // }

                ////// get repeat , missing and singe  numbers //////

                $repeat_no = array();
                foreach($repeatd as $key=>$val)
                {
                    if($request->gender == 'Male')
                    {
                        $repeat_no[] = RepeatNumber::where('counts',$val)->select('id','counts','number','detail','detail_hindi')->first();
                    }
                    else
                    {
                        $repeat_no[] = RepeatNumber::where('counts',$val)->select('id','counts','number','detail_female as detail','detail_hindi_female as detail_hindi')->first();
                    }
                }

                $single_no_report = array();
                foreach($single_no as $key=>$val)
                {
                    if($request->gender == 'Male')
                    {
                        $single_no_report[] = RepeatNumber::where('counts',$val)->select('id','counts','number','detail','detail_hindi')->first();
                    }
                    else
                    {
                        $single_no_report[] = RepeatNumber::where('counts',$val)->select('id','counts','number','detail_female as detail','detail_hindi_female as detail_hindi')->first();
                    }
                    // $single_no_report[] = RepeatNumber::where('counts',$val)->first();
                }

                $missig_no_report = array();
                foreach($notpresent as $key=>$val)
                {
                    if($request->gender == 'Male')
                    {
                        $missig_no_report[] = MissingNumber::where('number',$val)->select('id','number','detail','detail_hindi')->first();

                    }
                    else{
                        $missig_no_report[] = MissingNumber::where('number',$val)->select('id','number','detail_female as detail','detail_hindi_female as detail_hindi')->first();

                    }
                    // $missig_no_report[] = MissingNumber::where('number',$val)->first();
                }


                //// restriction of report //////

                $userid = auth()->guard('vendor')->user()->id;
                $userss = User::where('id',$userid)->first();
                $userss->no_of_reports = $userss->no_of_reports - 1;
                $userss->save();

                $wallettransaction = new Reports();
                $wallettransaction->user_id = $userss->id;
                $wallettransaction->type = 'DR';
                $wallettransaction->count = 1;
                $wallettransaction->date = date('Y-m-d');
                $wallettransaction->created_at = date('Y-m-d H:i:s');
                $wallettransaction->updated_at = date('Y-m-d H:i:s');
                $wallettransaction->save();


                ///// get name number /////
                $name_no = $this->check_single($total);

                 ///// name no report ////

                 $name_report = [
                    "A"=>'Your Name '. $request->name,
                    "B"=>'Your Name number as per Chaldean Numerology is : '.$total.'/'.$name_no,
                    "c"=>'CHALDEAN NAME ANALYSIS :Name Compatibility as per Bhagyank',
                    "d"=> 'need data (First name is Neutral to your date of birth, that means it is not lucky but it is still workable.)',
                    "e"=> 'CHALDEAN NAME ANALYSIS :Name Compatibility as per Moolank',
                    "f"=> 'need data (Great! Your Full Name is compatible/Lucky with your date of birth.)',
                    "g"=> 'Your Name Number',
                    "h"=> 'Your First Name number as per Chaldean Numerology is :'.$total,
                ];


                // print_r($present);exit;


                $driver_conduc = [$driver,$conductor];
                $is_1_contains = Str::contains(1,$present);
                $is_5_contains = Str::contains(5,$present);
                $is_6_contains = Str::contains(6,$present);

                $is_8_contains = Str::contains(8,$driver_conduc);
                $is_3_contains = Str::contains(3,$driver_conduc);

                // $is_156_contains = Str::contains('2,9,6',$present);

                // print_r($is_156_contains);exit;


                $best_name_no = 0;
                if($is_5_contains != 1)
                {
                    $best_name_no = 5;
                }
                elseif($is_3_contains != 1)
                {
                    $best_name_no = 6;
                }
                elseif($is_8_contains != 1)
                {
                    $best_name_no = 1;
                }
                elseif ($is_1_contains == 1 && $is_5_contains == 1 && $is_6_contains == 1 && $is_8_contains != 1 && $is_3_contains != 1) {
                    $best_name_no = 1;
                }
                else{
                    $best_name_no = 5;
                }

                // print_r($best_name_no);exit;



                $data['name_total'] = $total;
                $data['name_no'] = $name_no;
                $data['best_name_no'] = $best_name_no;
                $data['driver'] = $driver;
                $data['conductor'] = $conductor;
                $data['kuwa_no'] = $kuwa_no;
                $data['mobile_total'] = $mobile_number;
                $data['mobile'] = $mobile;
                $data['personalyear'] = $personalyear;
                $data['personalmonth'] = $personalmonth;
                $data['personal_date'] = $personal_date;
                $data['avoid_no'] = $avoid_no;
                $data['lucky_no'] = $lucky_no;
                $data['friend_no'] = $friend_no;
                $data['present'] = $present;
                $data['missing'] = $notpresent;

                $data['name'] = $request->name;
                $data['calculation'] = $valuearray;
                // $data['strength'] = $strength;
                $obj = json_decode(json_encode($data), false);
                $planobj = json_decode(json_encode($plan), false);
                $planreportobj = json_decode(json_encode($planreport), false);




                $gridarray = array();
                $gridarray[] = '4';
                $gridarray[] = '9';
                $gridarray[] = '2';
                $gridarray[] = '3';
                $gridarray[] = '5';
                $gridarray[] = '7';
                $gridarray[] = '8';
                $gridarray[] = '1';
                $gridarray[] = '6';


                $data['plan'] = $planobj;
                $data['gridarray'] = $gridarray;
                $data['plan'] = $planobj;
                $data['gridarray'] = $gridarray;
                
                $data['planreportobj'] = $planreportobj;

                $data['driver_report'] = $driver_report;
                $data['conductor_report'] = $conductor_report;
                $data['repeat_no'] =  $repeat_no;
                $data['single_no_report'] =  $single_no_report;

                $data['name'] = $request->name;
                $data['requesteddate'] = $requesteddate;
                $data['requestedgender'] = $request->gender;
                $data["gridarray"] = $gridarray;
                $data["data"] = $obj;
                $data["plane"] = $planobj;
                $data["driver_report"]=$driver_report;
                $data["conductor_report"]=$conductor_report;
                $data["repeat_no"] = $repeat_no;
                $data["single_no_report"] = $single_no_report;
                $data["punch_line"]= $punch_line;
                $data["karmic_no"]= $karmic_no;
                $data["missig_no_report"]= $missig_no_report;
                $data["mobile_report"] = $mobile_report;
                $data["lucky_colors"] = $lucky_colors;
                $data["avoid_colors"] = $pdfavoid_colors;
                $data["lucky_proffession"] = $lucky_proffession;
                $data["avoid_proffession"] = $avoid_proffession;
                $data["personalyear_report"] = $personalyear_report;
                $data["nextpersonalmonth"] = $nextpersonalmonth;
                $data["lucky_days"] = $pdflucky_days;
                $data["avoid_days"] = $pdfavoid_days;
                $data["name_report"] = $name_report;
                $data["thoughtarray"] = $thoughtarray;
                $data["willarray"] = $willarray;
                $data["actionarray"] = $actionarray;
                $data["mentalarray"] = $mentalarray;
                $data["emotionalarray"] = $thoughtarray;
                $data["practicalarray"] = $practicalarray;
                $data["success1array"] = $success1array;
                $data["success2array"] = $success2array;

                //  echo"<pre>";print_r($reportdata);exit;

                $pdf = PDF::loadView('check', $data);
                $filename = time()."_pdfenglish".$requesteddate.".pdf";
                Storage::put('pdf/'.$filename, $pdf->output());

                $pdfhindi = PDF::loadView('checkhindi', $data);
                $filenamehindi = time()."_pdfhindi".$requesteddate.".pdf";
                Storage::put('pdf/'.$filenamehindi, $pdfhindi->output());


                $path = Url::to('storage/app/pdf/',$filename);
                $pathhindi = Url::to('storage/app/pdf/',$filenamehindi);
                            //  print_r($pdf);exit;
                //             Mail::send('invoice', $reportdata, function($message)use($reportdata, $pdf, $booking) {
                //             $message->to($reportdata['email'])
                //             ->from("bubdiservices@gmail.com", "Bubdi")
                //             ->subject($booking->title)
                //              ->attachData($pdf->output(), "invoice.pdf");
                // });

                $path = Url::to('storage/app/pdf/',$filename);


            }
            else{
                return response()->json(['status' => false,'is_reports'=>0,'message'=>'Please purchase plan first']);
            }
        }
        else{
            return response()->json(['status' => false,'message'=>'please login first']);
        }

        return response()->json(['status' => true,'message'=>'success','is_reports'=>1,
                                'data' => $obj ,
                                'plane'=> $planobj,
                                'planreport'=> $planreportobj,
                                'driver_report'=>$driver_report,
                                'conductor_report'=>$conductor_report,
                                'repeat_no' => $repeat_no,
                                'single_no_report' => $single_no_report,
                                'punch_line'=> $punch_line,
                                'karmic_no'=> $karmic_no,
                                'missig_no_report'=> $missig_no_report,
                                'mobile_report' => $mobile_report,
                                'lucky_colors' => $lucky_colors,
                                'avoid_colors' => $avoid_colors,
                                'lucky_proffession' => $lucky_proffession,
                                'avoid_proffession' => $avoid_proffession,
                                'personalyear_report' => $personalyear_report,
                                'nextpersonalmonth' => $nextpersonalmonth,
                                'lucky_days' => $lucky_days,
                                'avoid_days' => $avoid_days,
                                'name_report' => $name_report,
                                'thoughtarray' => $thoughtarray,
                                'willarray' => $willarray,
                                'actionarray' => $actionarray,
                                'mentalarray' => $mentalarray,
                                'emotionalarray' => $thoughtarray,
                                'practicalarray' => $practicalarray,
                                'success1array' => $success1array,
                                'success2array' => $success2array,
                                'pdf_path' => $path,
                                'pdf_path_hindi' => $pathhindi

                                ]);
    }



    public function PersonalDate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dob' => 'required|numeric',
            'desire_date' => 'required|numeric',
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

        if(auth()->guard('vendor')->user())
        {
            $dob = $request->dob;
            $desire_no = $request->desire_date;
            $desire_no = str_split($desire_no);
            $month = $desire_no[2].$desire_no[3];

             //// change date format

             $myDate = $desire_no[0].$desire_no[1].'/'.$desire_no[2].$desire_no[3].'/'.$desire_no[4].$desire_no[5].$desire_no[6].$desire_no[7];
             $checkmonth = Carbon::createFromFormat('d/m/Y', $myDate)->format('F');

             $checkdate = $desire_no[0].$desire_no[1].' '.$checkmonth.' '.$desire_no[4].$desire_no[5].$desire_no[6].$desire_no[7];

             $desire_no = $desire_no[0] + $desire_no[1] + $desire_no[2] + $desire_no[3] + $desire_no[4] + $desire_no[5] + $desire_no[6] + $desire_no[7];

            $currentyear = str_split(date("Y"));
            $personalyear = $dob[0] + $dob[1] + $dob[2] + $dob[3] +$currentyear[0] + $currentyear[1] + $currentyear[2] + $currentyear[3];
            $personalyear = $this->check_single($personalyear);

            $personalmonth = $personalyear + $month;
            $personalmonth = $this->check_single($personalmonth);

            $your_no = $desire_no + $personalyear + $personalmonth;
            $your_no = $this->check_single($your_no);

            $driver = $dob[0].$dob[1];
            $driver = $this->check_single($driver);
            $conductor = $dob[0] + $dob[1] + $dob[2] + $dob[3] + $dob[4] + $dob[5] + $dob[6] + $dob[7];
            // print_r($conductor);exit;
            $conductor = $this->check_single($conductor);

            $enemy = ['8','4,6,8,9','6','2,9,4,8','0','3,9','0','1,2,4,8,9','2,4,6,8,9'];
            $friend = ['1,2,3,4,5,6,7,9','1,2,3,5,7','1,2,3,4,5,7,8,9','1,3,5,6,7','1,2,3,4,5,6,7,8,9','1,2,4,5,6,7,8','1,2,3,4,5,6,7,8,9','3,5,6,7','1,3,5,7'];

            $conductor_enemy = 0;
            $driver_enemy = 0;
            foreach($enemy as $key=>$val)
            {
                if($conductor == $key + 1)
                {
                    $conductor_enemy = $val;
                }

                if($driver == $key + 1)
                {
                    $driver_enemy = $val;
                }
            }

            $avoid_no = $conductor_enemy.','.$driver_enemy;
            $avoid_no = implode(',',array_unique(explode(',', $avoid_no)));

            $arr1 = explode(',', $avoid_no);
            $arr2 = range(1,9);
            $lucky_friend_no = array_diff($arr2,$arr1);

            $lucky_no = array();
            $friend_no = array();
            foreach($lucky_friend_no as $key=>$val)
            {
                if($val == 1)
                {
                    $lucky_no[] = $val;
                }
                elseif($val == 5)
                {
                    $lucky_no[] = $val;
                }
                elseif($val == 6)
                {
                    $lucky_no[] = $val;
                }
                else{
                    $friend_no[] = $val;
                }
            }

            $lucky_no = implode(',',$lucky_no);

            $contains = Str::contains($lucky_no, $your_no);

            // print_r($your_no);exit;

            if($contains == 1)
            {
                $data = $checkdate.' is your favorable day';
            }
            else{
                $data = $checkdate.' is not your favorable day';;
            }

            return response()->json(['status' => true,'message'=>'success','data'=>$data]);
        }
        else{
            return response()->json(['status' => false,'message'=>'please login first']);
        }

    }



    public function Plan(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $user_id = Auth::guard('vendor')->user()->id;

        $validator = Validator::make($request->all(),[

         ]);

         if ($validator->fails())
         {
             $message = [];
             foreach($validator->errors()->getMessages() as $keys=>$vals)
             {
                 foreach($vals as $k=>$v)
                 {
                     $message[] =  $v;
                 }
             }

             return response()->json([
                 'status' => false,
                 'message' => $message[0]
                 ]);
         }

        $plan = Plan::get();
        
        $buysubscription = BuySubscription::where('user_id',$user_id)->latest()->first();
        
        foreach($plan as $key=>$val)
        {
            // print_r($buysubscription);exit;
           
            if(!empty($buysubscription) && $buysubscription->plan_id == $val->id)
            {
                $val->is_subscribe = 1;
                $val->start_date = $buysubscription->start_date;
                $val->expiration_date = $buysubscription->expiration_date;
            }
            else{
                $val->is_subscribe = 0;
                $val->start_date = "0";
                $val->expiration_date = "0";
            }
            
        }

        return response()->json(['status' => true,'message'=>'success','data'=>$plan]);

    }


    public function BuySubscription(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $user_id = Auth::guard('vendor')->user()->id;

        $validator = Validator::make($request->all(),[
            'plan_id' => 'required|numeric|exists:plan,id',
            'transaction_id' => 'required'
        ]);

         if ($validator->fails())
         {
             $message = [];
             foreach($validator->errors()->getMessages() as $keys=>$vals)
             {
                 foreach($vals as $k=>$v)
                 {
                     $message[] =  $v;
                 }
             }

             return response()->json([
                 'status' => false,
                 'message' => $message[0]
                 ]);
         }

        $plan = Plan::where('id',$request->plan_id)->first();

        $expiration = Carbon::today()->addDays($plan->days);
        // $expiration_time = Carbon::today()->addDays($plan->days)->format('H:i');

        $buysubscription = new BuySubscription();
        $buysubscription->user_id = $user_id;
        $buysubscription->plan_id = $plan->id;
        $buysubscription->transaction_id = $request->transaction_id;
        $buysubscription->plan_name = $plan->title;
        $buysubscription->start_date = date('d-m-Y');
        $buysubscription->start_time = date('H:i');
        $buysubscription->expiration_date = $expiration->format('d-m-Y');
        $buysubscription->expiration_time = $expiration->format('H:i');
        $buysubscription->save();


        $userss = User::find($user_id);
        $userss->no_of_reports = $userss->no_of_reports + $plan->no_of_reports;
        $userss->end_date = $expiration->format('Y-m-d');
        $userss->save();

        $wallettransaction = new Reports();
        $wallettransaction->user_id = $user_id;
        $wallettransaction->type = 'CR';
        $wallettransaction->count = $plan->no_of_reports;
        $wallettransaction->date = $expiration->format('Y-m-d');
        $wallettransaction->time = $expiration->format('H:i');
        $wallettransaction->created_at = date('Y-m-d H:i:s');
        $wallettransaction->updated_at = date('Y-m-d H:i:s');
        $wallettransaction->save();

        $msg = 'Subscription buy successfully. Now you have access of '.$userss->no_of_reports.' reports';
        return response()->json(['status' => true,'message'=> $msg]);
    }


    public function MySubscription(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $user_id = Auth::guard('vendor')->user()->id;

        $validator = Validator::make($request->all(),[

        ]);

         if ($validator->fails())
         {
             $message = [];
             foreach($validator->errors()->getMessages() as $keys=>$vals)
             {
                 foreach($vals as $k=>$v)
                 {
                     $message[] =  $v;
                 }
             }

             return response()->json([
                 'status' => false,
                 'message' => $message[0]
                 ]);
         }

        $plan = BuySubscription::where('user_id',$user_id)
                                ->leftjoin('plan','plan.id','buy_subscription.plan_id')
                                ->select('buy_subscription.*','plan.title','plan.amount','plan.no_of_reports',
                                'plan.days')
                                ->get();
        $user = User::where('id',$user_id)->first();
        $current_reports_access = $user->no_of_reports;
        $your_expiration_date = $user->end_date;


        return response()->json(['status' => true,'message'=> 'success',
                                'current_reports_access'=>$current_reports_access,
                                'your_expiration_date'=>$your_expiration_date,'data'=>$plan]);
    }





    public function GetMarrigeDetail(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'male_name' => 'required',
            'male_dob' => 'required',
            'female_name' => 'required',
            'female_dob' => 'required',
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

        //////// male calculation  ///////
        $male_dob = str_split($request->male_dob);

        $male_driver = $male_dob[0].$male_dob[1];
        // print_r($male_driver);exit;

        $male_driver = $this->check_single($male_driver);


        $male_conductor = $male_dob[0] + $male_dob[1] + $male_dob[2] + $male_dob[3] + $male_dob[4] + $male_dob[5] + $male_dob[6] + $male_dob[7];
        $male_conductor = $this->check_single($male_conductor);

        $male_kuwa_no = $male_dob[4] + $male_dob[5] + $male_dob[6] + $male_dob[7];
        $male_kuwa_no = $this->check_single($male_kuwa_no);
        $male_kuwa_no = 11 - $male_kuwa_no;
        $male_kuwa_no = $this->check_single($male_kuwa_no);

        //////// female calculation  ///////

        $female_dob = str_split($request->female_dob);

        $female_driver = $female_dob[0].$female_dob[1];
        $female_driver = $this->check_single($female_driver);

        $female_conductor = $female_dob[0] + $female_dob[1] + $female_dob[2] + $female_dob[3] + $female_dob[4] + $female_dob[5] + $female_dob[6] + $female_dob[7];
        $female_conductor = $this->check_single($female_conductor);

        $female_kuwa_no = $female_dob[4] + $female_dob[5] + $female_dob[6] + $female_dob[7];
        $female_kuwa_no = $this->check_single($female_kuwa_no);
        $female_kuwa_no = $female_kuwa_no + 4;
        $female_kuwa_no = $this->check_single($female_kuwa_no);


        //// enemy friend ////

        $enemy = ['8','4,6,8,9','6','2,9,4,8','0','3,9','0','1,2,4,8,9','2,4,6,8,9'];
        $friend = ['1,2,3,4,5,6,7,9','1,2,3,5,7','1,2,3,4,5,7,8,9','1,3,5,6,7','1,2,3,4,5,6,7,8,9','1,2,4,5,6,7,8','1,2,3,4,5,6,7,8,9','3,5,6,7','1,3,5,7'];

        $male_conductor_enemy = 0;
        $male_driver_enemy = 0;
        $male_kuwa_enemy = 0;
        foreach($enemy as $key=>$val)
        {
            if($male_conductor == $key + 1)
            {
                $male_conductor_enemy = $val;
            }

            if($male_driver == $key + 1)
            {
                $male_driver_enemy = $val;
            }

            if($male_kuwa_no == $key + 1)
            {
                $male_kuwa_enemy = $val;
            }
        }


        // $male_avoid_no = $male_conductor_enemy.','.$male_driver_enemy;
        // $male_avoid_no = implode(',',array_unique(explode(',', $male_avoid_no)));

        // $male_arr1 = explode(',', $male_avoid_no);
        // $male_arr2 = range(1,9);
        // $male_lucky_friend_no = array_diff($male_arr2,$male_arr1);

        // $male_lucky_no = array();
        // $male_friend_no = array();
        // foreach($male_lucky_friend_no as $key=>$val)
        // {
        //     if($val == 1)
        //     {
        //         $male_lucky_no[] = $val;
        //     }
        //     elseif($val == 5)
        //     {
        //         $male_lucky_no[] = $val;
        //     }
        //     elseif($val == 6)
        //     {
        //         $male_lucky_no[] = $val;
        //     }
        //     else{
        //         $male_friend_no[] = $val;
        //     }
        // }

        // $male_lucky_no = implode(',',$male_lucky_no);
        // $male_friend_no = implode(',',$male_friend_no);



        //////// female friend enemy //////

        $female_conductor_enemy = 0;
        $female_driver_enemy = 0;
        $female_kuwa_enemy = 0;

        foreach($enemy as $key=>$val)
        {

            if($female_conductor == $key + 1)
            {
                $female_conductor_enemy = $val;
            }

            if($female_driver == $key + 1)
            {
                $female_driver_enemy = $val;
            }

            if($female_kuwa_no == $key + 1)
            {
                $female_kuwa_enemy = $val;
            }
        }

        $arr4 = explode(',', $female_driver_enemy);
        $arr2 = explode(',', $female_conductor_enemy);
        $arr3 = explode(',', $female_kuwa_enemy);


        $D_to_D = Str::contains($male_driver, $arr4);
        $C_to_C = Str::contains($male_conductor, $arr2);
        $K_to_K = Str::contains($male_kuwa_no, $arr3);

        // print_r($female_conductor_enemy);exit;

        if($D_to_D != 1)
        {
            $d = '20';
        }
        else{
            $d = '0';
        }

        if($C_to_C != 1)
        {
            $c = '20';
        }
        else{
            $c = '0';
        }

        if($K_to_K != 1)
        {
            $k = '10';
        }
        else{
            $k = '0';
        }


        // $female_avoid_no = $female_conductor_enemy.','.$female_driver_enemy;
        // $female_avoid_no = implode(',',array_unique(explode(',', $female_avoid_no)));


        // $female_arr1 = explode(',', $female_avoid_no);
        // $female_arr2 = range(1,9);
        // $female_lucky_friend_no = array_diff($female_arr2,$female_arr1);


        // $female_lucky_no = array();
        // $female_friend_no = array();
        // foreach($female_lucky_friend_no as $key=>$val)
        // {
        //     if($val == 1)
        //     {
        //         $female_lucky_no[] = $val;
        //     }
        //     elseif($val == 5)
        //     {
        //         $female_lucky_no[] = $val;
        //     }
        //     elseif($val == 6)
        //     {
        //         $female_lucky_no[] = $val;
        //     }
        //     else{
        //         $female_friend_no[] = $val;
        //     }
        // }

        // $female_lucky_no = implode(',',$female_lucky_no);
        // $female_friend_no = implode(',',$female_friend_no);


        ////// male ///////

        $male_date = $male_dob[0].$male_dob[1];
        $male_datematch = ['01','02','03','04','05','06','07','08','09','10','20','30'];
        $male_out = '';
        foreach($male_datematch as $key=>$val)
        {
            if($val == $male_date)
            {
                $male_out = 't';
            }

        }

        if($male_out != null)
        {
            $male_value = str_split($request->male_dob.$male_conductor.$male_kuwa_no);
        }
        else
        {
            $male_value = str_split($request->male_dob.$male_driver.$male_conductor.$male_kuwa_no);
        }



        $male_present = array();
        $male_notpresent = array();

        $male_getdata = array();
        $male_nodata = array();
        $male_freqs = array_count_values($male_value);

        $male_freq_4 = isset($male_freqs['4'])?$male_freqs['4']:0;
        $male_freq_9 = isset($male_freqs['9'])?$male_freqs['9']:0;
        $male_freq_2 = isset($male_freqs['2'])?$male_freqs['2']:0;
        $male_freq_3 = isset($male_freqs['3'])?$male_freqs['3']:0;
        $male_freq_5 = isset($male_freqs['5'])?$male_freqs['5']:0;
        $male_freq_7 = isset($male_freqs['7'])?$male_freqs['7']:0;
        $male_freq_8 = isset($male_freqs['8'])?$male_freqs['8']:0;
        $male_freq_1 = isset($male_freqs['1'])?$male_freqs['1']:0;
        $male_freq_6 = isset($male_freqs['6'])?$male_freqs['6']:0;


        if($male_freq_4 == 0)
        {
            $male_notpresent[] = 4;
            $male_nodata[] = '4';
        }
        else{
            $male_present[] = 4;
            $male_getdata[] = $male_freq_4.' time 4';
        }
        if($male_freq_9 == 0)
        {
            $male_notpresent[] = 9;
            $male_nodata[] = '9';
        }
        else{
            $male_present[] = 9;
            $male_getdata[] = $male_freq_9.' time 9';
        }
        if($male_freq_2 == 0)
        {
            $male_notpresent[] = 2;
            $male_nodata[] = '2';
        }
        else{
            $male_present[] = 2;
            $male_getdata[] = $male_freq_2.' time 2';
        }
        if($male_freq_3 == 0)
        {
            $male_notpresent[] = 3;
            $male_nodata[] = '3';

        }
        else{
            $male_present[] = 3;
            $male_getdata[] = $male_freq_3.' time 3';
        }
        if($male_freq_5 == 0)
        {
            $male_notpresent[] = 5;
            $male_nodata[] = '5';
        }
        else{
            $male_present[] = 5;
            $male_getdata[] = $male_freq_5.' time 5';
        }
        if($male_freq_7 == 0)
        {
            $male_notpresent[] = 7;
            $male_nodata[] = '4';
        }
        else{
            $male_present[] = 7;
            $male_getdata[] = $male_freq_7.' time 7';
        }
        if($male_freq_8 == 0)
        {
            $male_notpresent[] = 8;
            $male_nodata[] = '8';
        }
        else{
            $male_present[] = 8;
            $male_getdata[] = $male_freq_8.' time 8';
        }
        if($male_freq_1 == 0)
        {
            $male_notpresent[] = 1;
            $male_nodata[] = '1';
        }
        else{
            $male_present[] = 1;
            $male_getdata[] = $male_freq_1.' time 1';
        }
        if($male_freq_6 == 0)
        {
            $male_notpresent[] = 6;
            $male_nodata[] = '6';
        }
        else{
            $male_present[] = 6;
            $male_getdata[] = $male_freq_6.' time 6';
        }

        $male_valuearray = array(
            $male_freq_4,
            $male_freq_9,
            $male_freq_2,
            $male_freq_3,
            $male_freq_5,
            $male_freq_7,
            $male_freq_8,
            $male_freq_1,
            $male_freq_6,
        );

        /////// female /////

        $female_date = $female_dob[0].$female_dob[1];
        $female_datematch = ['01','02','03','04','05','06','07','08','09','10','20','30'];
        $female_out = '';
        foreach($female_datematch as $key=>$val)
        {
            if($val == $female_date)
            {
                $female_out = 't';
            }

        }

        if($female_out != null)
        {
            $female_value = str_split($request->female_dob.$female_conductor.$female_kuwa_no);
        }
        else
        {
            $female_value = str_split($request->female_dob.$female_driver.$female_conductor.$female_kuwa_no);
        }



        $female_present = array();
        $female_notpresent = array();

        $female_getdata = array();
        $female_nodata = array();
        $female_freqs = array_count_values($female_value);

        $female_freq_4 = isset($female_freqs['4'])?$female_freqs['4']:0;
        $female_freq_9 = isset($female_freqs['9'])?$female_freqs['9']:0;
        $female_freq_2 = isset($female_freqs['2'])?$female_freqs['2']:0;
        $female_freq_3 = isset($female_freqs['3'])?$female_freqs['3']:0;
        $female_freq_5 = isset($female_freqs['5'])?$female_freqs['5']:0;
        $female_freq_7 = isset($female_freqs['7'])?$female_freqs['7']:0;
        $female_freq_8 = isset($female_freqs['8'])?$female_freqs['8']:0;
        $female_freq_1 = isset($female_freqs['1'])?$female_freqs['1']:0;
        $female_freq_6 = isset($female_freqs['6'])?$female_freqs['6']:0;


        if($female_freq_4 == 0)
        {
            $female_notpresent[] = 4;
            $female_nodata[] = '4';
        }
        else{
            $female_present[] = 4;
            $female_getdata[] = $female_freq_4.' time 4';
        }
        if($female_freq_9 == 0)
        {
            $female_notpresent[] = 9;
            $female_nodata[] = '9';
        }
        else{
            $female_present[] = 9;
            $female_getdata[] = $female_freq_9.' time 9';
        }
        if($female_freq_2 == 0)
        {
            $female_notpresent[] = 2;
            $female_nodata[] = '2';
        }
        else{
            $female_present[] = 2;
            $female_getdata[] = $female_freq_2.' time 2';
        }
        if($female_freq_3 == 0)
        {
            $female_notpresent[] = 3;
            $female_nodata[] = '3';

        }
        else{
            $female_present[] = 3;
            $female_getdata[] = $female_freq_3.' time 3';
        }
        if($female_freq_5 == 0)
        {
            $female_notpresent[] = 5;
            $female_nodata[] = '5';
        }
        else{
            $female_present[] = 5;
            $female_getdata[] = $female_freq_5.' time 5';
        }
        if($female_freq_7 == 0)
        {
            $female_notpresent[] = 7;
            $female_nodata[] = '4';
        }
        else{
            $female_present[] = 7;
            $female_getdata[] = $female_freq_7.' time 7';
        }
        if($female_freq_8 == 0)
        {
            $female_notpresent[] = 8;
            $female_nodata[] = '8';
        }
        else{
            $female_present[] = 8;
            $female_getdata[] = $female_freq_8.' time 8';
        }
        if($female_freq_1 == 0)
        {
            $female_notpresent[] = 1;
            $female_nodata[] = '1';
        }
        else{
            $female_present[] = 1;
            $female_getdata[] = $female_freq_1.' time 1';
        }
        if($female_freq_6 == 0)
        {
            $female_notpresent[] = 6;
            $female_nodata[] = '6';
        }
        else{
            $female_present[] = 6;
            $female_getdata[] = $female_freq_6.' time 6';
        }


        $female_valuearray = array(
            $female_freq_4,
            $female_freq_9,
            $female_freq_2,
            $female_freq_3,
            $female_freq_5,
            $female_freq_7,
            $female_freq_8,
            $female_freq_1,
            $female_freq_6,
        );




        $male_i=0;
        foreach($male_notpresent as $key=>$val)
        {
            $matchcontains = Str::contains($val,$female_present);
            if($matchcontains == 1)
            {
                $male_i++;
            }
        }

        $female_i = 0;
        foreach($female_notpresent as $key=>$val)
        {
            $matchcontains = Str::contains($val,$male_present);
            if($matchcontains == 1)
            {
                $female_i++;
            }
        }

        if($female_i < $male_i)
        {
            $marrigematchcount = $female_i;
            $marrigematchper = $marrigematchcount * 15;
        }
        else{
            $marrigematchcount = $male_i;
            $marrigematchper = $marrigematchcount * 15;
        }
        // print_r($marrigematchper);exit;




		$male_data['driver'] = $male_driver;
        $male_data['conductor'] = $male_conductor;
        $male_data['kuwa_no'] = $male_kuwa_no;
        $male_data['male_conductor_enemy'] = $male_conductor_enemy;
        $male_data['male_driver_enemy'] = $male_driver_enemy;
        $male_data['male_kuwa_enemy'] = $male_kuwa_enemy;
        $male_data['present'] = $male_present;
        $male_data['missing'] = $male_notpresent;
        $male_data['calculation'] = $male_valuearray;
        $male_obj = json_decode(json_encode($male_data), false);



		$female_data['driver'] = $female_driver;
        $female_data['conductor'] = $female_conductor;
        $female_data['kuwa_no'] = $female_kuwa_no;
        $female_data['female_conductor_enemy'] = $female_conductor_enemy;
        $female_data['female_driver_enemy'] = $female_driver_enemy;
        $female_data['female_kuwa_enemy'] = $female_kuwa_enemy;
        $female_data['present'] = $female_present;
        $female_data['missing'] = $female_notpresent;
        $female_data['calculation'] = $female_valuearray;
        $female_obj = json_decode(json_encode($female_data), false);


        $total_compatibility = $d + $c + $k + $marrigematchper ;

        $data['D_to_D'] = $d;
        $data['C_to_C'] = $c;
        $data['K_to_K'] = $k;
        $data['gifted_count'] = $marrigematchcount;
        $data['marrige_compatibility'] = $marrigematchper;
        $data['total_compatibility'] = $total_compatibility;
        $data = json_decode(json_encode($data), false);
        return response()->json(['status' => true,'message'=>'success','data'=>$data,'male_data' => $male_obj,'female_data' => $female_obj]);
    }
    
}
