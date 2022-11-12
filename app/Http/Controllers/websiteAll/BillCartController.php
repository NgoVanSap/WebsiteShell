<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\billCart;
use App\Models\oderItemCheckout;
use Carbon\Carbon;
use DB;
use Auth;
use Mail;
use Validator;
use App\Repositories\CartLists;




class BillCartController extends Controller
{

    public $viewCartList;

    public function __construct(CartLists $viewCartList) {

        $this->viewCartList = $viewCartList;

    }

    public function index() {


        $productViewCart = $this->viewCartList->getViewCartList();

        $total = $this->viewCartList->totalCheckout();

        return view('website.checkout.checkout',[
            'productViewCart' => $productViewCart,
            'total'      => $total,

        ]);


    }

    public function postBillCartProduct(Request $request) {
        $userId = Auth::guard('customer')->id();
        $oder = Cart::where('user_id','=',$userId)->get();
        $dateNowOrder =  Carbon::now()->isoFormat('MM-DD-YYYY');
        $transport = 15;
        $total = $this->viewCartList->totalCheckout();


        $validator = Validator::make($request->all(),[
            'bill_name'             => 'required',
            'bill_phone'            => 'required|min:11|numeric',
            'bill_email'            => 'required|email',
            'bill_address'          => 'required',
            'bill_payment'          => 'required',
        ],
        [
            'bill_name.required'         => 'Name cannot be blank.',
            'bill_email.email'           => 'Must enter correct Email format.',
            'bill_email.required'        => 'Email cannot be blank.',
            'bill_address.required'      => 'Address is not empty.',
            'bill_phone.required'        => 'Phone is not empty.',
            'bill_phone.min'             => 'Phone must enter exactly 11 numbers.',
            'bill_phone.numeric'         => 'Phone number must be',
            'bill_payment.required'      => 'Payment method is not blank.',


        ]);

        $bill_user_id = $request->bill_user_id;
        $bill_name = $request->bill_name;
        $bill_phone = $request->bill_phone;
        $bill_email = $request->bill_email;
        $bill_address = $request->bill_address;
        $bill_payment = $request->bill_payment;
        $bill_note = $request->bill_note ? $request->bill_note : 'No notes';
        $bill_total = $total;
        $amount_of_all_products = $total-=$transport;





        if(!$validator->passes()) {

            return response()->json(['status' => 0 , 'error' => $validator->errors()->toArray()]);

        } else {

           $billCartUser = billCart::create([
                 'bill_user_id'                  => $bill_user_id,
                 'bill_name'                    => $bill_name,
                 'bill_phone'                   => $bill_phone,
                 'bill_email'                   => $bill_email,
                 'bill_address'                 => $bill_address,
                 'bill_note'                    => $bill_note,
                 'bill_payment'                 => $bill_payment,
                 'bill_total'                   => $bill_total,
                 'amount_of_all_products'       => $amount_of_all_products,
                 'bill_status'                  => 1,
           ]);


           foreach($oder as $oderItems) {

             oderItemCheckout::create([
                'oder_product_id'           => $oderItems->product_id_cart,
                'oder_user_id'              => $oderItems->user_id,
                'oder_bill_cart_id'         => $billCartUser->id,
                'oder_cart_id_attribute'    => $oderItems->cart_id_attribute,
                'oder_quantity'             => $oderItems->quantity,
                'oder_price'                => $oderItems->cart_price,
                'oder_status'               => 1,

               ]);

            }

            if(!empty($billCartUser)) {
                return response()->json(['status' => 1,'success'=>'Order Success']);
                return redirect()->route('viewCartProduct.website');
            }

        }



    }

    public function deleteBillCartProduct($id) {

        $dataDeleteCartBillUser = Cart::where('user_id',$id)->get();
        if(!empty($dataDeleteCartBillUser)) {
            $dataDeleteCartBillUser->each->delete();
            return response()->json([

                'status' => true,

            ]);
        } else {

            return response()->json([

                'status' => false

            ]);

        }
    }

    public function testMail(Request $request) {

        if(!empty(Auth::guard('admin')->check())) {
            $productViewCart = $this->viewCartList->getViewCartList();

            $total = 0;
            $transport = 15;
            foreach ($productViewCart as $productViewCarts) {

                $total += $productViewCarts->price_sale > 0 ? $productViewCarts->price_sale : $productViewCarts->price * $productViewCarts->quantity;

            }
            $total+=$transport;

            $name = 'Ngo van sap';
             Mail::send('website.emailCheckout.emailCheckOut',[
                'productViewCart' => $productViewCart,

            ], function($email) use ($name,$productViewCart) {
                $email->subject('Cảm Ơn Qúy khách Đã Đặt Hàng');
                $email->to('sapkuga@gmail.com',$name);

            });



        }

    }
}
