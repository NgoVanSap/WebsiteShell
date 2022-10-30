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
              <h1>Revenue Statistics</h1>
            </div>
            <div class="ml-auto d-flex align-items-center">
              <nav>
                <ol class="breadcrumb p-0 m-b-0">
                  <li class="breadcrumb-item">
                    <a href="index.html">
                      <i class="ti ti-home"></i>
                    </a>
                  </li>
                  <li class="breadcrumb-item"> Dashboard </li>
                  <li class="breadcrumb-item active text-primary" aria-current="page">Revenue Statistics</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- end page title -->
        </div>
      </div>
      <!-- end row -->
      <!-- start real estate contant -->
      <div class="row">
        <div class="col-xs-6 col-xxl-3 m-b-30">
          <div class="card card-statistics h-100 m-b-0 bg-pink">
            <div class="card-body">
              <h2 class="text-white mb-0">{{ $countProduct }}</h2>
              <p class="text-white">All posted products</p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-xxl-3 m-b-30">
          <div class="card card-statistics h-100 m-b-0 bg-primary">
            <div class="card-body">
              <h2 class="text-white mb-0">{{ $countProductSale }}</h2>
              <p class="text-white">Products on sale</p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-xxl-2 m-b-30">
            <div class="card card-statistics h-100 m-b-0" style=" background-color: #f7b731!important; ">
              <div class="card-body">
                @if (!empty($dataTotalMonth))
                    <h2 class="text-white mb-0">${{ number_format($totalMonthCount,1) }}</h2>
                    <p class="text-white">Turnover : {{ request('totalMonth') }}</p>
                @else
                    <h2 class="text-white mb-0">${{ number_format($totalDateNow,1) }}</h2>
                    <p class="text-white">Turnover : {{ $dateNow }}</p>

                @endif
              </div>
            </div>
          </div>
        <div class="col-xs-6 col-xxl-2 m-b-30">
          <div class="card card-statistics h-100 m-b-0 bg-info">
            <div class="card-body">
                    <h2 class="text-white mb-0">${{ number_format($totalBillCartMonth,1) }}</h2>

              <p class="text-white">Total revenue this month</p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-xxl-2 m-b-30">
            <div class="card card-statistics h-100 m-b-0" style=" background-color: #32b432!important; ">
              <div class="card-body">
                <h2 class="text-white mb-0">${{ number_format($totalBillCartAll,1) }}</h2>
                <p class="text-white">Total revenue</p>
              </div>
            </div>
          </div>

      </div>
      <div class="row">
        <div class="col-xs-12 col-xxl-12 m-b-30" style="display: flex;align-items: center;">
            <span>Find total revenue by month: </span>
            <form action="{{ route('totalMonth.details.admin') }}" method="get">
                <input type="date" name="totalMonth" value="{{ request('totalMonth') }}" style=" height: 40px; padding: .375rem .75rem; border-radius: .25rem; outline: none; border: 1px solid #dee2e6; margin-right: 2px; margin-left: 5px; ">
                <button type="submit" class="hoverSearchMonth"
                style="border-radius: 17%;outline: none;border: none;cursor: pointer;height: 38px;width: 38px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search colorFontsIcon" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg></button>
            </form>
        </div>
      </div>
      <div class="row">
        <div class="col-xxl-12 m-b-30">
          <div class="card card-statistics h-100 mb-0">
            <div class="card-header">
              <h4 class="card-title">Selling products</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th>Order ID</th>
                          <th>Customer</th>
                          <th style="text-align: center">Photo</th>
                          <th style="text-align: center">Price</th>
                          <th style="text-align: center">Total amount purchased</th>
                          <th style="text-align: center">Quantity sold</th>
                        </tr>
                      </thead>
                        @foreach ($sellingProduct as $key => $sellingProducts)
                            <tbody class="text-muted mb-0">
                                <tr>
                                    <td>#{{ $key + 1 }}</td>
                                    <td>{{ $sellingProducts->name }}</td>
                                    <td style="text-align: center">
                                    <div class="bg-img" >
                                        <img class="img-fluid rounded" style="width: 46px;" src="{{ asset('imgProduct/' .$sellingProducts->image) }}" alt="">
                                    </div>
                                    </td>
                                    <td style="text-align: center">{{ $sellingProducts->price }}</td>
                                    <td style="text-align: center">{{ $sellingProducts->totalMount }}</td>
                                    <td style="text-align: center">
                                        @if ($key == 0)

                                        <span class="badge badge-primary ">Top {{ $key + 1 }}</span>

                                        @elseif($key == 1)

                                        <span class="badge badge-success ">Top {{ $key + 1 }}</span>

                                        @elseif($key == 2)

                                        <span class="badge badge-danger ">Top {{ $key + 1 }}</span>

                                        @else

                                        <span class="badge badge-warning ">Top {{ $key + 1 }}</span>

                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                  </div>
              <div class="border-top my-4"></div>
              <h4 class="card-title">Income by department</h4>
              <div class="row">
                @foreach ($sellingProduct as $key => $sellingProducts)
                @php
                    $Money = 0;
                    $widthSet = 0;
                    $Money = $sellingProducts->price * $sellingProducts->totalMount;
                    if($Money > 5000) {
                        $widthSet = $Money / 150;
                    } else {
                        $widthSet = $Money / 100;
                    }
                @endphp
                @if ($key == 0)
                <div class="col-12 col-xs-3">
                    <span>Total money: <b>${{ number_format($Money,1) }}</b>
                    </span>
                    <div class="progress my-3" style="height: 4px;">
                      <div class="progress-bar" role="progressbar" style="width: {{ $widthSet }}%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                @elseif($key == 1)
                <div class="col-12 col-xs-3">
                    <span>Total money: <b>${{ number_format($Money,1) }}</b>
                    </span>
                    <div class="progress my-3" style="height: 4px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: {{ $widthSet }}%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                @elseif($key == 2)
                <div class="col-12 col-xs-3">
                    <span>Total money: <b>${{ number_format($Money,1) }}</b>
                    </span>
                    <div class="progress my-3" style="height: 4px;">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $widthSet }}%;" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                @else
                <div class="col-12 col-xs-3">
                    <span>Total money: <b>${{ number_format($Money,1) }}</b>
                    </span>
                    <div class="progress my-3" style="height: 4px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $widthSet }}%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

