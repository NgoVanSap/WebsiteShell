@extends('adminMaster.master')
@section('content')
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-6 m-b-30">
                        <div class="card card-statistics h-100 m-b-0">
                          <div class="card-header d-flex justify-content-between">
                            <div class="card-heading">
                              <h4 class="card-title">Order product information</h4>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-borderless mb-0">
                                <thead class="bg-light">
                                  <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                  </tr>
                                </thead>
                                @foreach ($orderItem as $orderItems)
                                <tbody class="text-muted mb-0">
                                    <tr>
                                      <td>
                                        <div class="bg-img">
                                          <img class="img-fluid rounded" src="{{ asset('imgProduct/' .$orderItems->image) }}" style="width: 46px;" alt="">
                                        </div>
                                      </td>
                                      <td>{{ $orderItems->name }}</td>
                                      <td>x{{ $orderItems->oder_quantity}}</td>
                                      <td>{{ $orderItems->size }}</td>
                                      <td>${{ $orderItems->oder_price }}</td>
                                    </tr>
                                  </tbody>
                                @endforeach
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="col-xl-6 col-xxl-4 m-b-30">
                        <div class="card card-statistics h-100 mb-0">
                            <div class="card-header">
                                <h4 class="card-title">Ordering information</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table table-bordered mb-0">
                                    <tbody>
                                      <tr>
                                        <td>
                                            <div class="bill-name">
                                                <span style=" font-weight: 700; color: #2c2e3e; ">User name: <span style="font-weight: 400;">{{ $orderDetail->bill_name }}</span></span>
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                            <div class="bill-phone">
                                                <span style=" font-weight: 700; color: #2c2e3e; ">Phone: <span style="font-weight: 400;">{{ $orderDetail->bill_phone }}</span></span>
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                            <div class="bill-email">
                                                <span style=" font-weight: 700; color: #2c2e3e; ">Email: <span style="font-weight: 400;">{{ $orderDetail->bill_email }}</span></span>
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                            <div class="bill-address" >
                                                <span style=" font-weight: 700; color: #2c2e3e; ">Address: <span style="font-weight: 400;">{{ $orderDetail->bill_address }}</span></span>
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                            <div class="bill-note">
                                                <span style=" font-weight: 700; color: #2c2e3e; ">Note: <span style="font-weight: 400;">{{ $orderDetail->bill_note }}</span></span>
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                            <div class="bill-payment">
                                                <span style=" font-weight: 700; color: #2c2e3e; ">Payment: <span style="font-weight: 400;">{{ $orderDetail->bill_payment}}</span></span>
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                            <div class="bill-date">
                                                <span style=" font-weight: 700; color: #2c2e3e; ">Order date: <span style="font-weight: 400;">{{ $orderDetail->created_at}}</span></span>
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                            <div class="bill-total">
                                                <span style=" font-weight: 700; color: #2c2e3e; ">Amount of all products: <span style="font-weight: 400;">${{ number_format($orderDetail->amount_of_all_products,1) }}</span></span>
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                            <div class="bill-total">
                                                <span style=" font-weight: 700; color: #2c2e3e; ">Total: <span style="font-weight: 400;">${{ number_format($orderDetail->bill_total,1) }}</span></span>
                                            </div>
                                        </td>
                                      </tr>

                                    </tbody>

                                  </table>
                                  <div class="">
                                    <form action="{{ route('updateOrderItemCheckout.details.admin',['id' => $orderDetail->id]) }}" method="post">
                                        @csrf
                                        <div style="width: 50%;font-weight: 700;color: #2c2e3e;margin-top: 20px;">
                                            <span>Update status</span>
                                            <select class="custom-select custom-select-sm" name="bill_status" required="">
                                              <option value="1"  {{ old('bill_status', $orderDetail->bill_status) == 1 ? 'selected' : '' }}>Wait for confirmation</option>
                                              <option value="2"  {{ old('bill_status', $orderDetail->bill_status) == 2 ? 'selected' : '' }}>Waiting for Goods</option>
                                              <option value="3"  {{ old('bill_status', $orderDetail->bill_status) == 3 ? 'selected' : '' }}>Delivering</option>
                                              <option value="4"  {{ old('bill_status', $orderDetail->bill_status) == 4 ? 'selected' : '' }}>Delivered</option>
                                            </select>
                                        </div>
                                        <div  style=" margin-top: 20px;">
                                            <button type="submit"  class="btn btn-outline-success">Update order status</button>
                                            <a href="{{ route('viewOrderItemCheckout.admin') }}" class="btn btn-outline-danger">Return</a>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                              </div>
                        </div>

                    </div>
                    {{-- <div class="col-xxl-4 m-b-30">
                        <div class="card card-statistics h-100 mb-0">
                            <div class="card-header">
                                <h4 class="card-title">Sales overview</h4>
                            </div>
                            <div class="card-body p-30">
                                <div class="row">
                                    <div class="col-xxs-6 h-100 p-2 border-right border-bottom border-xxs-right-0">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="p-3 text-center">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-round btn-inverse-primary"><i class="fe fe-settings"></i></a>
                                                <h2 class="m-t-20 mb-0">$272</h2>
                                                <p class="text-muted d-block m-b-0">Avg. Order Value</p>
                                                <span class="text-primary"> <i class="fe fe-activity"></i> 155.5% </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxs-6 h-100 p-2 border-bottom">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="p-3 text-center">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-round btn-inverse-success"><i class="fe fe-user-check"></i></a>
                                                <h2 class="m-t-20 mb-0">$450</h2>
                                                <p class="text-muted d-block m-b-0">Page Impressions</p>
                                                <span class="text-success"> <i class="fe fe-arrow-down-left"></i> 155.5% </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxs-6 h-100 p-2 border-right border-xxs-bottom border-xxs-right-0">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="p-3 text-center">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-round btn-inverse-danger"><i class="fe fe-bar-chart-2"></i></a>
                                                <h2 class="m-t-20 mb-0">$135</h2>
                                                <p class="text-muted d-block m-b-0">Quantity</p>
                                                <span class="text-danger"> <i class="fe fe-arrow-down-right"></i> 155.5% </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxs-6 h-100 p-2 ">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="p-3 text-center">
                                                <a href="javascript:void(0);" class="btn btn-icon btn-round btn-inverse-info"><i class="fe fe-crosshair"></i></a>
                                                <h2 class="m-t-20 mb-0">$7525</h2>
                                                <p class="text-muted d-block m-b-0">Total Products</p>
                                                <span class="text-info"> <i class="fe fe-arrow-up"></i> 155.5% </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
@endsection
