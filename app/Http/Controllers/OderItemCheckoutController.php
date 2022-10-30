<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\billCart;
use App\Models\oderItemCheckout;
use Carbon\Carbon;
use DB;
use Auth;
use Mail;
use App\Repositories\OrderItem;



class OderItemCheckoutController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $orderItems;

     public function __construct(OrderItem $orderItems) {

        $this->orderItems = $orderItems;
    }

     public function index()
    {
        $billProductUser = billCart::orderBy('id', 'desc')->get();

        return view('adminMaster.view-Order.index',[
            'billProductUser' => $billProductUser,
        ]);
    }

    public function viewOrderItemCheckoutDetails($id) {
        $orderDetails = $this->orderItems->getOrderItems($id);

        if(!$orderDetails) {
            return view('adminMaster.Error.404');
        }

        $orderItems = DB::table('oder_item_checkouts')
        ->join('products','oder_item_checkouts.oder_product_id','=','products.id')
        ->where('oder_item_checkouts.oder_user_id','=',$orderDetails->bill_user_id)
        ->whereTime('oder_item_checkouts.created_at','=',$orderDetails->created_at)
        ->select('oder_item_checkouts.*','products.name','products.image','products.price','products.price_sale','products.id as product_id_cart','products.slug_name')
        ->get();


        return view('adminMaster.view-Order.viewOrderDetail',['orderItem' => $orderItems, 'orderDetail' => $orderDetails]);


    }
    public function updateOrderItemCheckoutDetails($id,Request $request) {

        $billUpdate = billCart::where('id',$id)->update([
            'bill_status' => $request->bill_status,


        ]);

        $orderCheckoutGet = oderItemCheckout::where('oder_bill_cart_id','=',$id)->update([
            'oder_status' => $request->bill_status,
        ]);



        if(!empty($billUpdate)) {
            toastr()->success('Order status update successful');

            return redirect()->route('viewOrderItemCheckout.admin');
        }

    }

    public function deleteOrderItemCheckoutDetails($id) {
        $deleteOrderItemCheckoutDetails = $this->orderItems->getOrderItems($id);


        if(!empty($deleteOrderItemCheckoutDetails)) {

            $deleteOrderItemCheckoutDetails->delete();
            toastr()->success('Deleted order successfully');
            return redirect()->back();

        } else {
            toastr()->error('Deleted order failed');
        }
    }

    public function deleteOrderItemCheckoutAll(Request $request) {
        $selectAll = $request->selectAll;

        $dataToDeleteAll = DB::table('bill_carts')->whereIn('id',explode(",", $selectAll))->delete();

        if(!empty($dataToDeleteAll)) {

            return response()->json(['status' => true]);

        }
    }

    public function orderFilter(Request $request) {

        $dataOrderFilter = billCart::whereBetween('created_at',  [$request->dateFirst , Carbon::parse($request->dateLast)->endOfDay()])->orderBy('id','desc')->get();
        $dateRequestDateFirst = billCart::whereDate('created_at' , $request->dateFirst)->orderBy('id','desc')->get();
        $dateRequestDateLast = billCart::whereDate('created_at' , $request->dateLast)->orderBy('id','desc')->get();


        if(empty($request->dateFirst) || empty($request->dateLast)) {
            if(!empty($request->dateFirst)) {

                return view('adminMaster.view-Order.viewOrderDateSearch',['dateRequestDateFirst' =>  $dateRequestDateFirst]);

            } else {
                if(!empty($request->dateLast)) {
                    return view('adminMaster.view-Order.viewOrderDateSearch',['dateRequestDateFirst' =>  $dateRequestDateLast]);

                } else {
                    toastr()->error('Please enter a date to search!');
                    return redirect()->back();
                }

            }
        } else {
            return view('adminMaster.view-Order.viewOrderDateSearch',['dataOrderFilter' =>  $dataOrderFilter]);
        }




    }

    public function totalMonth(Request $request) {
        $totalMonthCount = 0;
        $dataTotalMonth = billCart::where('bill_status','>=',4)->whereDate('created_at',$request->totalMonth)->get();


        foreach ($dataTotalMonth as $dataTotalMonths) {
            $totalMonthCount += $dataTotalMonths->amount_of_all_products;

        }

        if(empty($request->totalMonth)) {

            toastr()->error('Please enter a date to search!');
            return redirect()->back();

        } else {
                return view('adminMaster.admin-Dashboard.Dashboard',[
                    'dataTotalMonth'    => $dataTotalMonth ,
                    'totalMonthCount'   => $totalMonthCount,
                ]);
        }

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
     * @param  \App\Models\oderItemCheckout  $oderItemCheckout
     * @return \Illuminate\Http\Response
     */
    public function show(oderItemCheckout $oderItemCheckout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\oderItemCheckout  $oderItemCheckout
     * @return \Illuminate\Http\Response
     */
    public function edit(oderItemCheckout $oderItemCheckout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\oderItemCheckout  $oderItemCheckout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, oderItemCheckout $oderItemCheckout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\oderItemCheckout  $oderItemCheckout
     * @return \Illuminate\Http\Response
     */
    public function destroy(oderItemCheckout $oderItemCheckout)
    {
        //
    }
}
