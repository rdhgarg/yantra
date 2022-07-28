<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function Users(Request $request)
    {
      $front_users= $this->getReportData($request);
      return view('admin.users.vendor',compact('front_users'));
    }


    public function getReportData($request)
    {
       $user =  User::where('role_id',null)->latest()->with('user')

                             ->whereHas('user',function($query) use($request){

                             if(isset($request['from_date']) && !empty($request['from_date']) && isset($request['to_date']) && !empty($request['to_date'])){
                                 $query->whereBetween('created_at',[ $request['from_date'],$request['to_date'] ]);
                             }

                               if(isset($request['username']) && !empty($request['username'])){
                                   $query->where('id',$request['username']);
                               }
                             })


                         ->get();
         return $user;

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function CreateUser()
    {
        return view('admin.users.vendor-create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function SaveUser(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'required|numeric|digits:10|unique:users,mobile_no',
            'password' => 'required|min:6',

        ]);

        if($validator->fails()){

            $message = [];

            foreach($validator->errors()->getMessages() as $keys=>$vals){

                foreach($vals as $k=>$v){
                    $message[] =  $v;
                }
            }

            return response()->json([
                'status' => false,
                'msg' => $message[0]
            ]);
        }


        $userss = new User();
        $userss->name = $request->name;
        $userss->email = $request->email;
        $userss->mobile_no = $request->mobile_no;
        $userss->status = $request->status;
        $userss->password = Hash::make($request->password);
        $userss->wallet_amt = 0.00;
        $userss->created_by = Auth()->user()->id;

        if($request->hasFile('profile_image'))
        {
            $imageName = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('uploads/profile'), $imageName);
            $imageName = "uploads/profile/".$imageName;
            $userss->profile_image = $imageName;
        }

        $userss->save();

        return response()->json(['status' => true,'msg' => 'Vendor created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showUser(Request $request,$id)
    {
        $user = User::with('walletTransaction')->find($id);

        // echo "<pre>";print_r($user);
        // exit;
        return view('admin.users.vendor-show',compact('id','user'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function EditUser($id)
    {
        $post = User::find($id);
        return view('admin.users.vendor-edit',compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function UpdateUser(Request $request,$id)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_no' => 'required|numeric|digits:10|unique:users,mobile_no,'.$id,

        ]);

        if($validator->fails()){

            $message = [];

            foreach($validator->errors()->getMessages() as $keys=>$vals){

                foreach($vals as $k=>$v){
                    $message[] =  $v;
                }
            }

            return response()->json([
                'status' => false,
                'msg' => $message[0]
            ]);
        }


        $userss = User::find($id);
        $userss->name = $request->name;
        $userss->email = $request->email;
        $userss->mobile_no = $request->mobile_no;
        $userss->status = $request->status;
        $userss->password = Hash::make($request->password);
        $userss->created_by = Auth()->user()->id;

        if($request->hasFile('profile_image'))
        {
            $imageName = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('uploads/profile'), $imageName);
            $imageName = "uploads/profile/".$imageName;
            $userss->profile_image = $imageName;
        }

        $userss->save();


        return response()->json(['status' => true,'msg' => 'Vendor Updated successfully']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

}
