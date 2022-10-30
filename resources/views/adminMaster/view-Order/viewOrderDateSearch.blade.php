@extends('adminMaster.master')
@section('content')
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>ALL ORDERS</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home.admin') }}"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    All orders
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Orders</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->
        <!-- start Validation row -->
        <div class="row ">

            <div class="col-md-12 m-b-30">
                <div class="card card-statistics h-100 mb-0">
                    <div class="card-header d-sm-flex justify-content-between align-items-center py-3">
                        <div class="card-heading mb-3 mb-sm-0">
                            <h4 class="card-title">Order</h4>
                        </div>
                    </div>
                    <div class="card-header d-sm-flex align-items-center py-3">
                        <a href="javascript:void(0)" id="deleteAll" data-url="{{ route('deleteOrderItemCheckoutAll.website') }}">
                            <span class="nav align-items-center">
                              <span>
                                <i class="fa fa-trash-o"></i>
                              </span>
                              <span>
                                <span style="margin-left: 5px">Delete multiple orders</span>
                              </span>
                            </span>
                          </a>
                          <form action="{{ route('orderFilter.details.admin') }}" method="GET">
                            <div style="margin-left: 40px;padding: 14px;">
                                <span>Date First</span>
                                <input style=" height: 40px;padding: .375rem .75rem;border-radius: .25rem;outline: none;border: 1px solid #dee2e6;margin-right: 20px; margin-left: 5px " type="date" value="{{ request('dateFirst') }}" name="dateFirst" placeholder="MM/DD/YYYY">
                                <span>Date Last</span>
                                <input style=" height: 40px; padding: .375rem .75rem; border-radius: .25rem; outline: none;border: 1px solid #dee2e6;margin-left: 5px  " type="date" value="{{ request('dateLast') }}" name="dateLast" placeholder="MM/DD/YYYY">
                                <button type="submit" class="hoverSearchMonth" style="border-radius: 17%;outline: none;border: none;cursor: pointer;height: 38px;width: 38px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search colorFontsIcon" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg>
                                </button>
                        </div>
                          </form>

                    </div>
                    <div class="card-body scrollbar scroll_dark mCustomScrollbar _mCS_5 mCS-autoHide" style="max-height: 420px; position: relative; overflow: visible;"><div id="mCSB_5" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_5_container" class="mCSB_container" style="position: relative; top: -171px; left: 0px;" dir="ltr">
                        <div class="d-xxs-flex align-items-center">
                            <div class="total-sales">
                                <p>Total Sales</p>
                                <h1>$9514</h1>
                            </div>
                            <div class="mb-3 mb-sm-0 ml-auto">
                                <button class="btn btn-primary btn-xs">View All Invoices</button>
                            </div>
                        </div>
                        <div class="d-none d-sm-flex progress m-t-20 m-b-0" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-6 col-xxs-3 ">
                                <p>Overdue</p>
                                <h4>$1596</h4>
                            </div>
                            <div class="col-6 col-xxs-3 ">
                                <p>Outstanding</p>
                                <h4>$2586</h4>
                            </div>
                            <div class="col-6 col-xxs-3 ">
                                <p>Open</p>
                                <h4>$5678</h4>
                            </div>
                            <div class="col-6 col-xxs-3 ">
                                <p>Paid</p>
                                <h4>$2458</h4>
                            </div>
                        </div>
                        <div class="table-responsive m-t-20">
                            <table id="datatable-buttons" class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="master"></th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Order details</th>
                                        <th style="text-align: center">Option</th>
                                    </tr>
                                </thead>
                                <tbody class="text-muted">
                                    @if (!empty($dateRequestDateFirst))
                                    @foreach ($dateRequestDateFirst as $dateRequestDateFirsts)
                                    <tr>
                                        <td><input type="checkbox" class="checkedOder" name="checkedOder" id="checkbox_{{ $dateRequestDateFirsts->id }}" data-id="{{ $dateRequestDateFirsts->id }}"></td>
                                        <td>{{ $dateRequestDateFirsts->bill_name }}</td>
                                        <td>{{  $dateRequestDateFirsts->created_at }}</td>
                                        <td>${{ number_format($dateRequestDateFirsts->bill_total,1) }}</td>
                                        <td>
                                            @if ($dateRequestDateFirsts->bill_status == 1)
                                                <label class="badge badge-danger-inverse">Wait for confirmation</label>
                                            @elseif ($dateRequestDateFirsts->bill_status == 2)
                                                <label class="badge mb-0 badge-warning-inverse">Waiting for Goods</label>
                                            @elseif($dateRequestDateFirsts->bill_status == 3)
                                                <label class="badge badge-info-inverse">Delivering</label>
                                            @elseif($dateRequestDateFirsts->bill_status == 4)
                                                <label class="badge badge-success-inverse">Delivered</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('viewOrderItemCheckout.details.admin',['id' => $dateRequestDateFirsts->id]) }}" style=" text-decoration: revert; font-size: 11px;">
                                                View order details.
                                            </a>
                                        </td>
                                        <td style="text-align: center">
                                            <a href="{{ route('deleteOrderItemCheckout.details.admin',['id' => $dateRequestDateFirsts->id]) }}"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @elseif(!empty($dataOrderFilter))
                                    @foreach ($dataOrderFilter as $dataOrderFilters)
                                    <tr>
                                        <td><input type="checkbox" class="checkedOder" name="checkedOder" id="checkbox_{{ $dataOrderFilters->id }}" data-id="{{ $dataOrderFilters->id }}"></td>
                                        <td>{{ $dataOrderFilters->bill_name }}</td>
                                        <td>{{  $dataOrderFilters->created_at }}</td>
                                        <td>${{ number_format($dataOrderFilters->bill_total,1) }}</td>
                                        <td>
                                            @if ($dataOrderFilters->bill_status == 1)
                                                <label class="badge badge-danger-inverse">Wait for confirmation</label>
                                            @elseif ($dataOrderFilters->bill_status == 2)
                                                <label class="badge mb-0 badge-warning-inverse">Waiting for Goods</label>
                                            @elseif($dataOrderFilters->bill_status == 3)
                                                <label class="badge badge-info-inverse">Delivering</label>
                                            @elseif($dataOrderFilters->bill_status == 4)
                                                <label class="badge badge-success-inverse">Delivered</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('viewOrderItemCheckout.details.admin',['id' => $dataOrderFilters->id]) }}" style=" text-decoration: revert; font-size: 11px;">
                                                View order details.
                                            </a>
                                        </td>
                                        <td style="text-align: center">
                                            <a href="{{ route('deleteOrderItemCheckout.details.admin',['id' => $dataOrderFilters->id]) }}"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    @foreach ($dateRequestDateLast as $dateRequestDateLasts)
                                    <tr>
                                        <td><input type="checkbox" class="checkedOder" name="checkedOder" id="checkbox_{{ $dateRequestDateLasts->id }}" data-id="{{ $dateRequestDateLasts->id }}"></td>
                                        <td>{{ $dateRequestDateLasts->bill_name }}</td>
                                        <td>{{  $dateRequestDateLasts->created_at }}</td>
                                        <td>${{ number_format($dateRequestDateLasts->bill_total,1) }}</td>
                                        <td>
                                            @if ($dateRequestDateLasts->bill_status == 1)
                                                <label class="badge badge-danger-inverse">Wait for confirmation</label>
                                            @elseif ($dateRequestDateLasts->bill_status == 2)
                                                <label class="badge mb-0 badge-warning-inverse">Waiting for Goods</label>
                                            @elseif($dateRequestDateLasts->bill_status == 3)
                                                <label class="badge badge-info-inverse">Delivering</label>
                                            @elseif($dateRequestDateLasts->bill_status == 4)
                                                <label class="badge badge-success-inverse">Delivered</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('viewOrderItemCheckout.details.admin',['id' => $dateRequestDateLasts->id]) }}" style=" text-decoration: revert; font-size: 11px;">
                                                View order details.
                                            </a>
                                        </td>
                                        <td style="text-align: center">
                                            <a href="{{ route('deleteOrderItemCheckout.details.admin',['id' => $dateRequestDateLasts->id]) }}"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div></div><div id="mCSB_5_scrollbar_vertical" class="mCSB_scrollTools mCSB_5_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;">
                        </div></div>
                </div>
            </div>
    </div>
</div>
@endsection
@section('js')
<script>

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            $(document).ready(function(){
                Command: toastr["error"]("{{ $error }}");
        });
        @endforeach
    @endif
</script>
@endsection
