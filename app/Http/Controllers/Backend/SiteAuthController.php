<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
use Validator;
use Excel;
class SiteAuthController extends Controller
{
    public function siteRegister()
    {
    return view('siteRegister');
    }

    public function emi_calculator($p, $r, $t)
    {
        $emi;
        // one month interest
        $r = $r / (12 * 100);
        // one month period
        $t = $t;
        $emi = ($p * $r * pow(1 + $r, $t)) / (pow(1 + $r, $t) - 1);
        return ($emi);
    }
    
    public function getFranchiseData()
    {
        $data=DB::table('franchise')->get();
        return view('admin.franchise-list')->with(['data'=>$data]);
    }

    public function SavesiteRegister(Request $request)
    {
         $data=$this->emi_calculator($request->outstanding_amt,$request->time,$request->rate);
         return view('siteRegister')->with(['data'=>$data]);

    }

    public function viewDetail($id)
    {
     $post=DB::table('franchise')->where(['id'=>$id])->get();
     return view('admin.view-details')->with(['post'=>$post]);
    }

    public function ExportExcel(){
        return view('admin.franchise-list');
    }
    

}
