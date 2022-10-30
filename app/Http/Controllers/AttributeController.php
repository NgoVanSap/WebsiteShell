<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Requests\AttributeRequest;


class AttributeController extends Controller
{
    public function index($id) {

        $idAttributes = Attribute::find($id);
        $attributes = Product::where('id',$id)->first();
        return view('adminMaster.admin-product.addAttribute' ,[

            'attributes'        => $attributes,
            'idAttributes'    => $idAttributes,

        ]);


    }

    public function insertAttribute(Request $request,$id) {

        if($request->isMethod('POST')) {

            $data = $request->all();

            foreach ($data['size'] as $key => $val) {
                if($data['amount'][$key] < 1) {

                    toastr()->warning('Quantity Cannot Be Less Than 1');
                    return redirect()->back();

                } else {

                    if(!empty($val)) {

                        $attribute = new Attribute;
                        $attribute->size = $val;
                        $attribute->product_id = $id;
                        $attribute->amount = $data['amount'][$key];
                        $attribute->save();

                    }

                }

            }
            if(!empty($attribute)) {
                toastr()->success('Add Success Attribute');
            }
        }
        return redirect()->route('attribute.admin.add',$id);

    }

    public function deleteAttribute($id) {

        $deleteAttribute = Attribute::find($id)->delete();

       if(!empty($deleteAttribute)) {
           toastr()->success('Delete Success Attribute');
           return redirect()->back();
       }
    }

    public function updateAttribute(Request $request,$id = null) {

        $data = $request->all();

        foreach ($data['attr'] as $key => $val) {

            if($data['amount'][$key] < 1) {
                toastr()->warning('Quantity Cannot Be Less Than 1');
                return redirect()->back();
            } else {
                $dataUpdate = Attribute::where('id', $data['attr'][$key])->update([

                    'size'      => $data['size'][$key],
                    'amount'    => $data['amount'][$key]

                ]);
            }

        }
        if(!empty($dataUpdate)) {
            toastr()->success('Update Success Attribute');
        }
        return redirect()->back();

    }
}
