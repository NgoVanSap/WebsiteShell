<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserComment;
use App\Models\Product;
use DB;
use Carbon\Carbon;
use App\Repositories\UserCommentList;


class ViewUserComment extends Controller
{
    public $userCommentList;
    public $userCommentDetails;

    public function __construct(UserCommentList $userCommentList, UserCommentList $userCommentDetails) {

        $this->userCommentList = $userCommentList;
        $this->userCommentDetails = $userCommentDetails;

    }

    public function viewUserComment() {

        $dataComment = $this->userCommentList->getUserComments();

        return view('adminMaster.viewUserComment.index',[

            'dataComment' => $dataComment,

        ]);
    }

    public function viewUserCommentDetail($idUser) {

        $dataDetailCommentList = $this->userCommentDetails->getUserCommentDetails($idUser);


        return view('adminMaster.viewUserComment.detail',[

            'dataDetailCommentList' => $dataDetailCommentList,


        ]);
    }

    public function userCommentDetail($id,$idUser) {
        $dataDetailCommentList = $this->userCommentDetails->getUserCommentDetails($idUser);

        $dataDetailCommentFirst = DB::table('user_comments')
        ->where('id',$id)
        ->where('comment_user_id',$idUser)
        ->first();

        $dataCommentProductFirst = DB::table('products')
        ->where('id',$dataDetailCommentFirst->comment_product_id)
        ->first();



        return view('adminMaster.viewUserComment.index2',[
            'dataDetailCommentList' => $dataDetailCommentList,
            'dataCommentProductFirst' => $dataCommentProductFirst,
            'dataDetailCommentFirst'  => $dataDetailCommentFirst,
        ]);
    }

    public function viewUserCommentDetailDelete($id,$idUser) {
        $userCommentDetailDelete = UserComment::where('id', $id)
        ->where('comment_user_id', $idUser)
        ->delete();
        $userCommentCount = UserComment::count();

        $dataDetailCommentList = $this->userCommentDetails->getUserCommentDetails($idUser);


        if($dataDetailCommentList->count() > 0) {
            if(!empty($userCommentDetailDelete)) {
                toastr()->success('Comment deleted successfully');
                return redirect()->route('viewUserCommentDetail.website',['idUser' => $dataDetailCommentList[0]->comment_user_id ]);
            }
        } else {
            if ($userCommentCount > 0) {
                toastr()->success('Comment deleted successfully');
                return redirect()->route('viewUserComment.website');
            } else {
                toastr()->success('All user comments removed');
                return redirect()->route('viewUserComment.website');
            }
        }


    }



}
