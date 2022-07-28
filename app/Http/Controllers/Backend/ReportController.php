<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bookings;
use App\User;
use App\Vendors;
use App\Pincode;
use App\Category;
use App\FrontUser;
use App\Product;
use App\HappySection;
use App\Wishlist;
use App\AskhelpClaim;
use App\Claim;
use App\Askhelp;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ReportController extends Controller
{

    public function getReportData($request){

        $front_users =  User::where('role_id',null)->latest()->with('user')

        ->whereHas('user',function($query) use($request){

        if(isset($request['from_date']) && !empty($request['from_date']) && isset($request['to_date']) && !empty($request['to_date'])){
            $query->whereBetween('created_at',[ $request['from_date'],$request['to_date'] ]);
        }

          if(isset($request['username']) && !empty($request['username'])){
              $query->where('id',$request['username']);
          }
        })
        ->get();

       // echo"<pre>";print_r($user);exit;
        // foreach($user as $key=>$vals){

        //     $vals->totalclaims = Claim::where('user_id','=',$vals->id)->with('products','owner','user')->count();


        //       $vals->donate = Product::where('item_donate','1')->where('created_by',$vals->id) ->count();

        //       $vals->donatedclaims = Claim::where('owner_id',$vals->id)->count();

        //       $vals->happy = HappySection::where('user_id',$vals->id)->count();

        //       $vals->askhelp = Askhelp::where('created_by',$vals->id)->count();

        //       $vals->askhelpclaim = AskhelpClaim::where('owner_id',$vals->id)->count();

        //       $vals->wishlist = Wishlist::where('user_id',$vals->id)->count();

        // }


         //prd($vendors);
        //  echo"<pre>";print_r($user);exit;
        return $front_users;

    }

    public function getAskhelpData($request){

        $allpro =  Askhelp::with('askhelp')
                              ->whereHas('askhelp',function($query) use($request){

                                  if(isset($request['from_date']) && !empty($request['from_date']) && isset($request['to_date']) && !empty($request['to_date'])){
                                      $query->whereBetween('created_at',[ $request['from_date'],$request['to_date'] ]);
                                  }

                                  if(isset($request['category_id']) && !empty($request['category_id'])){
                                    $query->where('category_id',$request['category_id']);
                                    }
                                  if(isset($request['sub_category_id']) && !empty($request['sub_category_id'])){
                                    $query->where('sub_category_id',$request['sub_category_id']);
                                    }
                                  })


                          ->get();

            foreach($allpro as $key=>$vals){
                $vals->totalaskhelp = AskhelpClaim::where('product_id','=',$vals->id)->count();
            }

           //prd($vendors);
          //  echo"<pre>";print_r($user);exit;
          return $allpro;

    }

    public function getDonateData($request){

        $allpro =  Product::with('product')
                            ->whereHas('product',function($query) use($request){

                                if(isset($request['from_date']) && !empty($request['from_date']) && isset($request['to_date']) && !empty($request['to_date'])){
                                    $query->whereBetween('created_at',[ $request['from_date'],$request['to_date'] ]);
                                }

                                if(isset($request['category_id']) && !empty($request['category_id'])){
                                $query->where('category_id',$request['category_id']);
                                }
                                if(isset($request['sub_category_id']) && !empty($request['sub_category_id'])){
                                $query->where('sub_category_id',$request['sub_category_id']);
                                }
                                if(isset($request['product_name']) && !empty($request['product_name'])){
                                $query->where('id',$request['product_name']);
                                }
                                })


                          ->get();


            foreach($allpro as $key=>$vals){
                $vals->claimrequested = Claim::where('product_id','=',$vals->id)->count();
            }


           //prd($vendors);
          //  echo"<pre>";print_r($user);exit;
          return $allpro;

    }


    public function askhelpReport(Request $request)
    {
        if(isset($request->type) && $request->type=='export'){

            $array = $request->all();

            $filename = time()."_report.csv";
            $res =  Excel::store(new TaskExportAskhelp($array), $filename,'reports');
            // echo"<pre>";print_r($res);exit;


            if($res){
                $file_path = url('/').'/storage/reports/'.$filename;
                //exit;
                 //header("Content-Type: application/octet-stream");
                // header("Content-Transfer-Encoding: Binary");
               header("Content-disposition: attachment; filename=\"".$filename."\"");

                echo readfile($file_path);exit;
            }else{
                echo 'error in report generate please try again';
            }

        }


        $categories= Category::where(['parent_id'=>0])->get();
        // $categories = Category::where('parent_id','0')->orderBy('title', 'asc')->get();
        // $subcategories = Category::where('parent_id','!=','0')->orderBy('title', 'asc')->get();
        $product_name = Product::orderBy('product_name', 'asc')->get();

        $allpro = Askhelp::with('category','frontuser','subcategory')
                            ->get();
        $allpro = $this->getAskhelpData($request);

        return view("admin.reports.askhelp", compact('categories','product_name','allpro'));
    }

    public function donateReport(Request $request)
    {

        if(isset($request->type) && $request->type=='export'){

            $array = $request->all();
            $filename = time()."_report.csv";
            $res =  Excel::store(new TaskExportDonate($array), $filename,'reports');

            if($res){
                $file_path = url('/').'/storage/reports/'.$filename;
                //exit;
                 //header("Content-Type: application/octet-stream");
                // header("Content-Transfer-Encoding: Binary");
               header("Content-disposition: attachment; filename=\"".$filename."\"");

                echo readfile($file_path);exit;
            }else{
                echo 'error in report generate please try again';
            }

        }


        $categories= Category::where(['parent_id'=>0])->get();
        // $categories = Category::where('parent_id','0')->orderBy('title', 'asc')->get();
        // $subcategories = Category::where('parent_id','!=','0')->orderBy('title', 'asc')->get();
        $product_name = Product::orderBy('product_name', 'asc')->get();
        $allpro = Product::select('products.*','front_users.name as user_name')
                            ->leftjoin('front_users','front_users.id','=','products.created_by')
                            ->get();
        $allpro = $this->getDonateData($request);


        return view("admin.reports.donate", compact('categories','product_name','allpro'));
    }

    public function getSubcategory(Request $request){
        $category= Category::select('id','title')->where(['parent_id'=>$request->id])->get();
        return response()->json($category);
    }

    public function userReport(Request $request)
    {
        if(isset($request->type) && $request->type=='export'){

            $array = $request->all();
            $filename = time()."_report.csv";
            $res =  Excel::store(new TaskExport($array), $filename,'reports');

            if($res){
                $file_path = url('/').'/storage/reports/'.$filename;
                //exit;
                 //header("Content-Type: application/octet-stream");
                // header("Content-Transfer-Encoding: Binary");
               header("Content-disposition: attachment; filename=\"".$filename."\"");

                echo readfile($file_path);exit;
            }else{
                echo 'error in report generate please try again';
            }

        }
        $front_users  = $this->getReportData($request);
        $pincodes = Pincode::get();
        return view("admin.reports.user", compact('pincodes','front_users'));
    }

}
