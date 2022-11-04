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
            'dob' => 'required|numeric',
            'number' => 'nullable|numeric',
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
        $month = $dob[2].$dob[3];
        $day = $dob[0].$dob[1];
        $year = $dob[6].$dob[7];
        if($request->number)
        {
            $d = (int)$request->number;
        }
        else{
            $d = $dob[0] + $dob[1] + $dob[2] + $dob[3] + $dob[4] + $dob[5] + $dob[6] + $dob[7];
        }

        $a = $this->check_single($month);
        $b = $this->check_single($day);
        $c = $this->check_single($year);
        $d = $this->check_value($d);
        
        // $destiny = $d;
        
                
        $destiny = $dob[0] + $dob[1] + $dob[2] + $dob[3] + $dob[4] + $dob[5] + $dob[6] + $dob[7];
        $destiny = $this->check_value($destiny);
        
        $personal_yantrano = $a + $b + $c + $destiny;
         
        $personal_yantrano = $this->check_single($personal_yantrano);
        
        
        
        if($request->number)
        {
            $d = $destiny +(int)$request->number -$personal_yantrano  ;
        }
        else{
            $d = $dob[0] + $dob[1] + $dob[2] + $dob[3] + $dob[4] + $dob[5] + $dob[6] + $dob[7];
        }
        
        $basic = $this->check_single($dob[0] + $dob[1]);


// print_r($this->check_value($c - 2));exit;
        $ar = array(
                    $this->check_value(abs((int)$a)),
                    
                    $this->check_value(abs((int)$b)),
                    $this->check_value(abs((int)$c)),
                    $this->check_value(abs($d)),
                    $this->check_value(abs($year - 2)),
                    $this->check_value(abs($d + 2)),
                    $this->check_value(abs($month - 2)),
                    $this->check_value(abs($day + 2)),
                    $this->check_value(abs($d + 1)),
                    $this->check_value(abs($year + 1)),
                    $this->check_value(abs($day - 1)),
                    $this->check_value(abs($month - 1)),
                    $this->check_value(abs($day + 1)),
                    $this->check_value(abs($month - 3)), 
                    $this->check_value(abs($d + 3)), 
                    $this->check_value(abs($year - 1)),

                );
                
        foreach($ar as $key=>$val)
        {
            $val = strval($val);
        }
        $data = array();
        foreach($ar as $key=>$val)
        {
            if($key == 4)
            {
                $data[] = DB::table('data')->where('box','E')->where('no',$val)->first();
            }
            if($key == 5)
            {
                $data[] = DB::table('data')->where('box','F')->where('no',$val)->first();
            }
            // if($key == 6)
            // {
            //     $data[] = DB::table('data')->where('box','G')->where('no',$val)->first();
            // }
            // if($key == 7)
            // {
            //     $data[] = DB::table('data')->where('box','H')->where('no',$val)->first();
            // }
            if($key == 8)
            {
                $data[] = DB::table('data')->where('box','I')->where('no',$val)->first();
            }
            if($key == 9)
            {
                $data[] = DB::table('data')->where('box','J')->where('no',$val)->first();
            }
            // if($key == 10)
            // {
            //     $data[] = DB::table('data')->where('box','K')->where('no',$val)->first();
            // }
            if($key == 11)
            {
                $data[] = DB::table('data')->where('box','L')->where('no',$val)->first();
            }
            if($key == 12)
            {
                $data[] = DB::table('data')->where('box','M')->where('no',$val)->first();
            }
            // if($key == 13)
            // {
            //     $data[] = DB::table('data')->where('box','N')->where('no',$val)->first();
            // }
            if($key == 14)
            {
                $data[] = DB::table('data')->where('box','O')->where('no',$val)->first();
            }
            if($key == 15)
            {
                $data[] = DB::table('data')->where('box','P')->where('no',$val)->first();
            }
        }
       


        //  print_r($ar);exit;
        return response()->json(['status' => true, 'basic'=>$basic,'destiny'=>$destiny,'data' => $ar, 'desc'=>$data]);
    }
    
    
     public function getNumberstest(Request $request)
    {

        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
            'dob' => 'required|numeric',
            'number' => 'nullable|numeric',
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
        $month = $dob[2].$dob[3];
        $day = $dob[0].$dob[1];
        $year = $dob[6].$dob[7];
        if($request->number)
        {
            $d = (int)$request->number;
        }
        else{
            $d = $dob[0] + $dob[1] + $dob[2] + $dob[3] + $dob[4] + $dob[5] + $dob[6] + $dob[7];
        }

        $a = $this->check_single($month);
        $b = $this->check_single($day);
        $c = $this->check_single($year);
        $d = $this->check_value($d);
        
        $destiny = $dob[0] + $dob[1] + $dob[2] + $dob[3] + $dob[4] + $dob[5] + $dob[6] + $dob[7];
        $destiny = $this->check_value($destiny);
        
        $personal_yantrano = $a + $b + $c + $destiny;
         
        $personal_yantrano = $this->check_single($personal_yantrano);
        
        $x = $destiny +(int)$request->number -$personal_yantrano  ;
      //print_r($personal_yantrano);exit;

// print_r($this->check_value($c - 2));exit;
        $ar = array(
                    $this->check_value((int)$a),
                    
                    $this->check_value((int)$b),
                    $this->check_value((int)$c),
                    $this->check_value($x),
                    $this->check_value($year - 2),
                    $this->check_value($x + 2),
                    $this->check_value($month - 2),
                    $this->check_value($day + 2),
                    $this->check_value($x + 1),
                    $this->check_value($year + 1),
                    $this->check_value($day - 1),
                    $this->check_value($month - 1),
                    $this->check_value($day + 1),
                    $this->check_value($month - 3), 
                    $this->check_value($x + 3), 
                    $this->check_value($year - 1),

                );
                
        
        $data = array();
        foreach($ar as $key=>$val)
        {
            if($key == 4)
            {
                $data[] = DB::table('data')->where('box','E')->where('no',$val)->first();
            }
            if($key == 5)
            {
                $data[] = DB::table('data')->where('box','F')->where('no',$val)->first();
            }
            // if($key == 6)
            // {
            //     $data[] = DB::table('data')->where('box','G')->where('no',$val)->first();
            // }
            // if($key == 7)
            // {
            //     $data[] = DB::table('data')->where('box','H')->where('no',$val)->first();
            // }
            if($key == 8)
            {
                $data[] = DB::table('data')->where('box','I')->where('no',$val)->first();
            }
            if($key == 9)
            {
                $data[] = DB::table('data')->where('box','J')->where('no',$val)->first();
            }
            // if($key == 10)
            // {
            //     $data[] = DB::table('data')->where('box','K')->where('no',$val)->first();
            // }
            if($key == 11)
            {
                $data[] = DB::table('data')->where('box','L')->where('no',$val)->first();
            }
            if($key == 12)
            {
                $data[] = DB::table('data')->where('box','M')->where('no',$val)->first();
            }
            // if($key == 13)
            // {
            //     $data[] = DB::table('data')->where('box','N')->where('no',$val)->first();
            // }
            if($key == 14)
            {
                $data[] = DB::table('data')->where('box','O')->where('no',$val)->first();
            }
            if($key == 15)
            {
                $data[] = DB::table('data')->where('box','P')->where('no',$val)->first();
            }
        }
       


        //  print_r($ar);exit;
        return response()->json(['status' => true, 'destiny'=>$destiny,'data' => $ar, 'desc'=>$data]);
    }
    
    
    function check_value($number)
	{
	    $split_number = str_split($number);
	    if ($split_number[0] == '-') {
                 $final = $number;
                 return $final;
        }
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
	    $split_number = str_split($number);
	    if ($split_number[0] == '-') {
                 $final = $number;
                 return $final;
        }
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
            if($single == 11 || $single == 22)
            {
                $final = $single;
            }
            else{
                
    			$singleArray =   str_split($single);
    			$final = 0 ;
    			if (count($singleArray) > 1) {
                    foreach ($singleArray as $val1) {
                        $final += $val1;
                    }
                } else {
                    $final = $single;
                }
            }
			return $final;
	    }
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
    
    public function getReport(Request $request)
    {



        //print_r($request->all());
        $validator = Validator::make($request->all(), [
            'box' => 'required',
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


		$data = DB::table('data')->where('box',$request->box)->where('no',$request->number)->first();
        return response()->json(['status' => true, 'data' => $data, 'base_url' => url('/api/auth/') . '/']);

    }
}
