<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;


class ChangeSizeController extends Controller
{
    public function changeSizeAttribute($idAttributes) {

        $changeSizeAttribute = Attribute::where('id',$idAttributes)->first();

        if ($changeSizeAttribute->amount <=0) {

            return response()->json(['status' => 1]);

        } else {


            return response()->json(['status' => 2, 'data' => $changeSizeAttribute]);

        }
    }
}
