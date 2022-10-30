<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminMaster.adminMaster-login.admin-master-login');

    }
    public function postLoginAdmin(Request  $request)
    {
        $createAdminLogin = $request->only('email','password');
        if (Auth::guard('admin')->attempt($createAdminLogin) && Auth::guard('admin')->user()->role >=1) {
            return redirect()->route('home.admin');
        } else {
            toastr()->error('You are not Admin or wrong password!');
            return redirect()->route('admin.login');
        }

    }

    public function homeAdmin()
    {
        return view('adminMaster.admin-Dashboard.Dashboard');
    }

    public function postLogoutAdmin(Request $request) {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function viewMoremembers()
    {

        $dataListMember = Admin::where('role','<=' ,2)->orderBy('id','desc')->get();

        return view('adminMaster.adminMaster-addUser.adminMaster-addUser',[

            'dataListMember' => $dataListMember,

        ]);
    }

    public function postMoremember(Request $request)
    {

        $validate = $request->validate([
            'email'         => 'required|email|unique:admins',
            'username'      => 'required|unique:admins',
            'password'      => 'required|max:20|min:6',
            're_password'   => 'required|same:password',
            'role'          => 'required',
        ],
        [
            'email.unique'          => 'This email already exists.',
            'email.required'        => 'Email is not blank.',
            'email.email'           => 'Must enter the correct email format.',
            'username.required'     => 'User name is not blank.',
            'username.unique'       => 'This user name already exists.',
            'password.required'     => 'Password is not blank.',
            'password.min'          => 'Password must be 6 characters or more.',
            're_password.required'  => 'Re-Password is not blank.',
            're_password.same'      => 'Re-Password does not match Password.',
            'role.required'         => 'Role is not blank.',
        ]);

        $email       = $request->email;
        $username    = $request->username;
        $password    = $request->password;
        $re_password = $request->re_password;
        $role        = $request->role;

        $createRigister = Admin::create([
            'email'         => $email,
            'username'      => $username,
            'password'      => Hash::make($password),
            're_password'   => Hash::make($re_password),
            'role'          => $role,
        ]);

        if(!empty($createRigister)) {
            toastr()->success('Register Member Success!');
            return redirect()->route('home.admin.Moremembers');
        }
    }

    public function deleteMoremembers($id)
    {
        $deleteMember = Admin::where('id','=', $id)->delete();

        if(!empty($deleteMember)) {
            toastr()->success('Delete Member Success');

            return redirect()->route('home.admin.Moremembers');
        } else {
            toastr()->error('Delete Member Failure');
            return redirect()->back();
        }
    }


    public function editDetailMoremembers($id) {

        $detailMember = Admin::find($id);

        return view('adminMaster.adminMaster-addUser.adminMaster-detail',[

            'detailMember' => $detailMember,

        ]);

    }

    public function updateMoremembers (Request $request)
    {

        $email       = $request->email;
        $username    = $request->username;
        $role        = $request->role;

        $dataUpdateMember = Admin::where('id','=', $request->id)->update([

            'email'         => $email,
            'username'      => $username,
            'role'          => $role,

        ]);

        if(!empty($dataUpdateMember)) {
            toastr()->success('Editing is successful');
            return redirect()->route('home.admin.Moremembers');
        }

    }

    public function changePassword () {
        return view('adminMaster.changePassword.changePassword');
    }

    public function changePasswordUpdate(Request $request) {

        $validator = Validator::make($request->all(),[
            'old_password' => 'required',
            'new_password' => 'required|max:20|min:6',
            'confirm_password' => 'required|same:new_password',
        ],
        [
            'old_password.required'         => 'Current cannot be blank.',
            'new_password.required'         => 'New password cannot be blank.',
            'new_password.min'              => 'New password must be 6 characters or more.',
            'confirm_password.required'     => 'Confirm password cannot be blank.',
            'confirm_password.same'         => 'Confirm password does not match New password.'

        ]);


        if(!$validator->passes()) {

            return response()->json(['status' => 0 , 'error' => $validator->errors()->toArray()]);

        }else if(!Hash::check($request->old_password,Auth::guard('admin')->user()->password )) {

            return response()->json(['status' => 1, 'error' => 'Password incorrect.']);

        }elseif(strcmp($request->old_password, $request->new_password) == 0){

            return response()->json(['status' => 2 , 'error' => 'The New Password cannot be the same as the current password']);

        } else {
            return response()->json(['status' => 3 ,'error' => 'Change password successfully']);
            $userUpdate = Auth::guard('admin')->user();
            $userUpdate->password = Hash::make($request['new_password']);;
            $userUpdate->save();
        }
    }
}
