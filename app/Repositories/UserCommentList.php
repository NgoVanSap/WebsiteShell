<?php
namespace App\Repositories;
use App\Models\UserComment;
use App\Models\Product;
use DB;
use Carbon\Carbon;



class UserCommentList  implements UserCommentInterface
{


    public function getUserComments() {
        return  DB::table('user_comments')
        ->join('customers','customers.id','=','user_comments.comment_user_id')
        ->select('customers.usernameCus as nameCus','customers.emailCus as emailCus',DB::raw(
            'count(*) as countComments,comment_user_id'
        ))
        ->groupBy('comment_user_id','nameCus','emailCus')
        ->orderBy('countComments','desc')
        ->get();
    }

    public function getUserCommentDetails($idUser) {

        return  DB::table('user_comments')
        ->join('products','products.id','=','user_comments.comment_product_id')
        ->join('customers','customers.id','=','user_comments.comment_user_id')
        ->where('comment_user_id',$idUser)
        ->select('user_comments.*','products.name','products.image','customers.usernameCus')
        ->orderBy('id','desc')
        ->get();
        
    }

}
