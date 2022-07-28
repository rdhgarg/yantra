<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Business;
use App\Store;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;
use Auth;
use PDF;

class PackageController extends Controller
{
    public function index()
    {
        return view('search');
    }


    public function autocomplete(Request $request)
    {
        $item=request('query');
        $data = User::select("email")
                ->where("email","LIKE","%$item%")
                ->get();
        return response()->json($data);
    }

    public function pdfview(Request $request)
    {
        $items = DB::table("users")->get();
        view()->share('items',$items);
        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }
        return view('pdfview');
    }
}
