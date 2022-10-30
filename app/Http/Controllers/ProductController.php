<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductRequest $request)
    {

        $newImageName = time() . '.' . $request->image->extension();
        $test = $request->image->move(public_path('imgProduct'), $newImageName);
        $random = Str::random(4);
        if($request->price_sale > $request->price) {

            toastr()->warning("Promotion Price Can't Be Greater Than Price");
            return redirect()->route('product.admin');

        } else {
            $data = Product::create([
                'name'              => $request->name,
                'slug_name'         => Str::slug($request->name). '-' .$random,
                'price'             => $request->price,
                'price_sale'        => $request->price_sale,
                'infomation'        => $request->infomation,
                'image'             => $newImageName,
                'product_type_id'   => $request->product_type_id,
                'is_open'           => 1,
            ]);
        }

        if(!empty($data)) {
            toastr()->success('More Successful Products');
            return redirect()->route('product.admin');
        }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dataProduct = Product::with('category')->orderBy('id','desc')
        ->paginate(5);
        $data = DanhMuc::all();
        return view('adminMaster.admin-product.Product', [

            'data'          => $data,
            'dataProduct'   => $dataProduct

        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataEdit = Product::find($id)->get();
        $data = DanhMuc::all();
        $dataProduct = DB::table('products')
        ->orderBy('id','desc')
        ->get();
        return view('adminMaster.admin-product.Product', [

            'data'          => $data,
            'dataEdit'      => $dataEdit,
            'dataProduct'   => $dataProduct

        ]);

    }

    public function detail($id) {
        $datalist = Product::find($id);
        $data = DanhMuc::all();

        return view('adminMaster.admin-product.index',[

            'data'      => $data,
            'datalist'  => $datalist

        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $post)
    {

        $validate = $request->validate([
            'name'                          => 'required',
            'price'                         => 'required|numeric',
            'price_sale'                    => 'required|numeric',
            'infomation'                    => 'required',
            'image'                         => 'image',
            'product_type_id'               => 'required',
            'is_open'                       => 'required'
        ],
        [
            'name.required'                 => 'Product name can be blank.',
            'price.required'                => 'Price is not blank.',
            'price.numeric'                 => 'Price must be entered in numbers.',
            'price_sale.required'           => 'Promotion price is not empty.',
            'price_sale.numeric'            => 'Promotion price must be entered in numbers',
            'image.image'                   => 'Must choose photo.',
            'product_type_id.required'      => 'Please select a category.',
            'is_open.required'              => 'Please select status.',
            'infomation.required'           =>' Information is not blank.'

        ]);
        $random = Str::random(4);

        if ($request->file('image')) {
            $newImageName = time() . '.' . $request->image->extension();
            $test = $request->image->move(public_path('imgProduct'), $newImageName);
            $data = Product::where('id','=',$request->id)->update([

                'name'              => $request->name,
                'slug_name'         => Str::slug($request->name). '-' .$random,
                'price'             => $request->price,
                'price_sale'        => $request->price_sale,
                'infomation'        => $request->infomation,
                'image'             => $newImageName,
                'product_type_id'   => $request->product_type_id,
                'is_open'           => $request->is_open,

            ]);

        } else {
            $data = Product::where('id','=',$request->id)->update([

                'name'              => $request->name,
                'slug_name'         => Str::slug($request->name). '-' .$random,
                'price'             => $request->price,
                'price_sale'        => $request->price_sale,
                'infomation'        => $request->infomation,
                'product_type_id'   => $request->product_type_id,
                'is_open'           => $request->is_open,

            ]);
        }


        if(!empty($data)) {
            toastr()->success('Edit Successfully');
            return redirect()->route('product.admin');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataDelete = Product::where('id','=', $id)->delete();

        if (!empty($dataDelete)) {
            toastr()->success('Delete Successfully');
            return redirect()->route('product.admin');
        } else {
            toastr()->error('Delete Failed');
            return redirect()->route('product.admin');
        }
    }


    public function search(Request $request) {

        if(isset($_GET['keyWord'])) {
            $nameProduct = $_GET['keyWord'];
            $dataSearch = Product::where('name','LIKE','%'. $nameProduct.'%')
            ->orWhere('price','LIKE','%'. $nameProduct.'%')
            ->orderBy('id','DESC')
            ->paginate(2);
            $dataSearch->appends($request->all());
            $data = DanhMuc::all();

             return view('adminMaster.admin-product.productSearch', [

                 'data'         => $data,
                 'dataSearch'   => $dataSearch

            ]);
        } else {
            return redirect()->back();
        }

    }
}
