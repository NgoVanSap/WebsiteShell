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
                        <h1>PRODUCT</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home.admin') }}"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Product
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Post products</li>
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
            <div class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Post products</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{ route('product.admin.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Product name <span style=" color: #db0404; ">(*)</span></label>
                                        <div class="mb-2">
                                            <input type="text" id="" class="form-control" value="{{old('name')}}" name="name" placeholder="Enter product name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Product price <span style=" color: #db0404; ">(*)</span></label>
                                        <div class="mb-2">
                                            <input type="text" id="" class="form-control" value="{{old('price')}}"  name="price" placeholder="Enter product price">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Product price sale <span style=" color: #db0404; ">(*)</span></label>
                                        <div class="mb-2">
                                            <input type="text" id="" class="form-control" value="{{old('price_sale')}}" name="price_sale" placeholder="Enter promotional price">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Product pictures <span style=" color: #db0404; ">(*)</span></label>
                                            <div class="mb-2">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" value="{{ old('image') }}" name="image" id="inputGroupFile01">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <label class="control-label" for="fname">Product information <span style=" color: #db0404; ">(*)</span></label>
                                        <div class="mb-2">
                                            <textarea class="form-control" name="infomation" id="exampleFormControlTextarea1" rows="5">{{ old('infomation') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Select a category <span style=" color: #db0404; ">(*)</span></label>
                                        <div >
                                            <select class="custom-select custom-select-sm" name="product_type_id" required>
                                                @foreach ($data as $valDataCategory)
                                                <option value="{{$valDataCategory->id}}" @if (old('product_type_id') == $valDataCategory->id) selected  @endif>{{$valDataCategory->namecategory}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-xl-6">
                                        <label class="control-label" for="fname">Select status <span style=" color: #db0404; ">(*)</span></label>
                                        <div style="display: flex;">
                                            <div class="form-check" style="padding: 4px 30px !important;">
                                                <input class="form-check-input" type="radio" name="is_open" {{ (old('is_open') == '1') ? 'checked' : ''}} id="gridRadios1" value="1" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    Rest
                                                </label>
                                            </div>
                                            <div class="form-check" style="padding: 4px 30px !important;">
                                                <input class="form-check-input" type="radio" name="is_open" {{ (old('is_open') == '2') ? 'checked' : ''}} id="gridRadios2" value="2">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Over
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit_category" class="btn btn-outline-success">Add product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 m-b-30">
                <div class="card card-statistics h-100 m-b-0">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-heading">
                            <h4 class="card-title">Posted product list</h4>
                        </div>
                        <form action="{{ route('admin.search') }}" method="GET">
                            <div class="dropdown">
                                <input type="text" name="keyWord"  class="form-control form-control-sm" value ="{{ request('keyWord') }}" placeholder="Search Invoice">
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Category</th>
                                        <th>Date </th>
                                        <th>Price/Price sale</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Add Attributes</th>
                                    </tr>
                                </thead>
                                @foreach ( $dataProduct as $value )
                                <tbody class="text-muted mb-0">
                                    <tr>
                                        <td>{{ $value->id  }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>
                                            <div class="bg-img">
                                                <img class="img-fluid rounded" src="{{ asset('imgProduct/' .$value->image) }}" style="width: 46px;" alt="">
                                            </div>
                                        </td>
                                        <td>{{ $value->category->namecategory }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>${{ number_format($value->price, 1) }} / ${{ number_format($value->price_sale, 1) }}</td>
                                        @php
                                            if($value->is_open == 1) {
                                                $var = 'Rest';
                                            } else {
                                                $var = 'Over';
                                            }
                                        @endphp
                                    <td style="text-align:center;">
                                            @if ($value->is_open == 1)
                                            <span class="badge badge-success" data-toggle="tooltip" data-original-title="Rest" >{{ $var }}</span>
                                            @else
                                            <span class="badge badge-danger " data-toggle="tooltip" data-original-title="Over" >{{ $var }}</span>
                                            @endif
                                    </td>
                                        <td>
                                            <a href="{{ route('product.edit.detail',['id'=> $value->id]) }}" class="mr-2"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                                            <a href="{{ route('product.delete',['id' => $value->id]) }}"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                        </td>
                                        <td style="text-align: center">
                                            
                                            @if ($value->attribute->count() > 1)

                                            <a  href="{{ route('attribute.admin.add',['id' => $value->id]) }}" class="btn btn-xs btn-success" data-toggle="tooltip" data-original-title="Add Attribute">Attribute</a>

                                            @else

                                            <a  href="{{ route('attribute.admin.add',['id' => $value->id]) }}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-original-title="Add Attribute">Attribute</a>

                                            @endif

                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>

                        </div>
                    </div>
                    {{ $dataProduct->links() }}
                </div>
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
