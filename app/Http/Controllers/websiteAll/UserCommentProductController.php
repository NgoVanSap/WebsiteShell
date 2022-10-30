<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\UserComment;
use Validator;
use DB;



class UserCommentProductController extends Controller
{
    //

    public function postCommentUser(Request $request,$id) {
        $userIdComment = Auth::guard('customer')->id();
        $detailProduct = Product::where('id', $id)->first();
        $validator = Validator::make($request->all(),[
            'comment_user_name'     => 'required',
            'comment_user_email'    => 'required|email',
            'comment_information'   => 'required',
        ],
        [
            'comment_user_name.required'            => 'User Name cannot be blank.',
            'comment_user_email.required'           => 'Email is not blank.',
            'comment_user_email.email'               => 'Must enter correct Email format.',
            'comment_information.required'          => 'Information Name cannot be blank.',
        ]);
        $comment_product_id     = $request->comment_product_id;
        $comment_user_name      = $request->comment_user_name;
        $comment_user_email     = $request->comment_user_email;
        $comment_information    = $request->comment_information;


        if(Auth::guard('customer')->check()) {
            if(!$validator->passes()) {

                return response()->json(['status' => 0 , 'error' => $validator->errors()->toArray()]);

            } else {

                $userIdCommentProduct = UserComment::create([

                    'comment_user_id'               => $userIdComment,
                    'comment_product_id'            => $detailProduct->id,
                    'comment_user_name'             => $comment_user_name,
                    'comment_user_email'            => $comment_user_email,
                    'comment_information'           => $comment_information,

                ]);

                if(!empty($userIdCommentProduct)) {
                    return response()->json(['status' => 1,'success'=>'Successful product review']);
                }

            }
        } else {
            return response()->json(['status' => 2 ,'error' => 'Please Login to the System']);
        }
    }

    public function loadCommentUser($id) {

        $detailProduct = Product::where('id', $id)->first();
        $detailProductUserComment = DB::table('user_comments')
        ->where('comment_product_id', $detailProduct->id)
        ->orderBy('id','desc')
        ->get();

        return response()->json(['data' => $detailProductUserComment]);
    }
}
