<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;



class CustomerController extends Controller
{
    public function viewLoginRegister() {

        return view('website.loginAndregister.index');
    }

    public function createRegister(Request $request) {


        $validator = Validator::make($request->all(),[
            'emailCus'         => 'required|email|unique:customers',
            'usernameCus'      => 'required|unique:customers',
            'password'         => 'required|max:20|min:6',
            're_passwordCus'   => 'required|same:password',
            'phoneCus'         => 'required|min:11|numeric',
        ],
        [
            'emailCus.unique'          => 'This email already exists.',
            'emailCus.required'        => 'Email cannot be blank.',
            'emailCus.email'           => 'Must enter correct Email format.',
            'usernameCus.required'     => 'Username is not empty.',
            'usernameCus.unique'       => 'This Username already exists.',
            'password.required'        => 'Password is not blank.',
            'password.min'             => 'Password must be 6 characters or more.',
            're_passwordCus.required'  => 'Re-Password not blank.',
            're_passwordCus.same'      => 'Re-Password does not match Password.',
            'phoneCus.required'        => 'Phone is not empty.',
            'phoneCus.min'             => 'Phone must enter exactly 11 numbers.',
            'phoneCus.numeric'         => 'Phone number must be',




        ]);

        $emailCus       = $request->emailCus;
        $usernameCus    = $request->usernameCus;
        $password    = $request->password;
        $re_passwordCus = $request->re_passwordCus;
        $phoneCus        = $request->phoneCus;

        if(!$validator->passes()) {

            return response()->json(['status' => 0 , 'error' => $validator->errors()->toArray()]);

        } else {

            $createRigisterCustomer = Customer::create([

                'emailCus'         => $emailCus,
                'usernameCus'      => $usernameCus,
                'password'          => Hash::make($password),
                're_passwordCus'   => Hash::make($re_passwordCus),
                'phoneCus'         => $phoneCus,
                'genre'            => 0,
                'dateCus'          => 0,

            ]);

            if(!empty($createRigisterCustomer)) {
                return response()->json(['status' => 1,'success'=>'Register Success']);
            }

        }

    }

    public function createLogin(Request $request) {

        $validator = Validator::make($request->all(),[
            'emailCus' => 'required',
            'password' => 'required'
        ],
        [
            'emailCus.required'     => 'Email cannot be blank.',
            'password.required'     => 'Password is not blank.',

        ]);

        if(!$validator->passes()) {
            return response()->json(['status' => 0 , 'error' => $validator->errors()->toArray()]);

        } else if (Auth::guard('customer')->attempt(['emailCus' => $request['emailCus'],'password' => $request['password']])) {

            return response()->json(['status' => 1,'success' => 'Login successful']);

        }else {

            return response()->json(['status' => 2,'error' => 'Email & Password Incorrect']);

        }

    }

    public function customerLogout() {

        Auth::guard('customer')->logout();

        return redirect()->back();
    }
}
