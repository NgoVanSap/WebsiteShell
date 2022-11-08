<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class MyAccountController extends Controller
{
    public function index() {
        return view('website.myAccount.index');
    }

    public function changeMyAccount(Request $request) {

        $validator = Validator::make($request->all(),[
            'emailCus'         => 'required|email|unique:customers',
            'usernameCus'      => 'required',
            'phoneCus'         => 'required|min:11|numeric',
        ],
        [
            'emailCus.unique'          => 'This email already exists.',
            'emailCus.required'        => 'Email cannot be blank.',
            'emailCus.email'           => 'Must enter correct Email format.',
            'usernameCus.required'     => 'Username is not empty.',
            'usernameCus.unique'       => 'This Username already exists.',
            'phoneCus.required'        => 'Phone is not empty.',
            'phoneCus.min'             => 'Phone must enter exactly 11 numbers.',
            'phoneCus.numeric'         => 'Phone number must be',




        ]);
        $genre          = $request->genre;
        $emailCus       = $request->emailCus;
        $usernameCus    = $request->usernameCus;
        $phoneCus       = $request->phoneCus;
        $dateCus        = $request->dateCus;


        if(!$validator->passes()) {

            return response()->json(['status' => 0 , 'error' => $validator->errors()->toArray()]);

        } else {

            $updateInformation = Customer::update([

                'emailCus'         => $emailCus,
                'usernameCus'      => $usernameCus,
                'phoneCus'         => $phoneCus,
                'genre'            =>  $genre,
                'dateCus'          =>  $dateCus,

            ]);

            if($updateInformation) {
                return response()->json(['status' => 1,'success'=>'Register Success']);
            }

        }




    }

    public function changeMyAccountPassword (Request $request) {

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

        }else if(!Hash::check($request->old_password,Auth::guard('customer')->user()->password )) {

            return response()->json(['status' => 1, 'error' => 'Password incorrect.']);

        }elseif(strcmp($request->old_password, $request->new_password) == 0){

            return response()->json(['status' => 2 , 'error' => 'The New Password cannot be the same as the current password.']);

        } else {
            $userUpdate = Auth::guard('customer')->user();
            $userUpdate->password = Hash::make($request['new_password']);;
            $userUpdate->save();
            return response()->json(['status' => 3 , 'success' => 'Change password successfully']);
        }

    }
}
