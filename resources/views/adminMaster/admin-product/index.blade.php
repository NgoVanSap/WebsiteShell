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
                        <h1>PRODUCT EDIT</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="http://127.0.0.1:8000/admin/home"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Product
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Product editing
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>_
        <!-- end row -->
        <!-- start Validation row -->
        <div class="row ">
            <div class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Product Editing </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.product.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $datalist->id }}">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Product name edit</label>
                                        <div class="mb-2">
                                            <input type="text" id="" class="form-control" value="{{ old('name',$datalist->name) }}"  name="name" placeholder="Product name edit">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Price for editing</label>
                                        <div class="mb-2">
                                            <input type="text" id="" class="form-control" value="{{ old('price',$datalist->price )}}" name="price" placeholder="Price for editing">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Promotional price edit</label>
                                        <div class="mb-2">
                                            <input type="text" id="" class="form-control" value="{{ old('price_sale',$datalist->price_sale) }}" name="price_sale" placeholder="Promotional price edit">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Edited images</label>
                                            <div class="mb-2">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" value="{{ old('image') }}"  accept="{{ asset('imgProduct/' .$datalist->image) }}" name="image" id="inputGroupFile01" multiple >
                                                    </div>
                                                </div>
                                                @if ($datalist->image)
                                                    <img src="{{ asset('imgProduct/' . $datalist->image) }}" alt="" class="img-fluid rounded" height="50px" width="50px" />
                                                @endif
                                            </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <label class="control-label" for="fname">Editing Information</label>
                                        <div class="mb-2">
                                            <textarea class="form-control" name="infomation" id="exampleFormControlTextarea1" rows="5">{{ old('infomation',$datalist->infomation) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Editing List</label>
                                        <div>
                                            <select class="custom-select custom-select-sm" name="product_type_id">
                                                <option>--- Select a category ---</option>
                                                @foreach ( $data as $category )
                                                     <option value="{{ $category->id }}"
                                                        {{ old('product_type_id', $datalist->product_type_id) == $category->id ? 'selected' : '' }}>{{ $category->namecategory }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="control-label" for="fname">Editing Status</label>
                                        <div style="display: flex;">
                                            <div class="form-check" style="padding: 4px 30px !important;">
                                                <input class="form-check-input" type="radio" name="is_open" {{ old('is_open', $datalist->is_open)== '1' ? 'checked' : '' }}  id="gridRadios1" value="1" checked="">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Rest
                                                </label>
                                            </div>
                                            <div class="form-check" style="padding: 4px 30px !important;">
                                                <input class="form-check-input" type="radio" name="is_open" {{ old('is_open', $datalist->is_open)== '2' ? 'checked' : '' }} id="gridRadios2" value="2">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Over
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-warning">Edit product</button>
                                <a href="{{ route('product.admin') }}" class="btn btn-outline-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Validation row  -->
    </div>
    <!-- end container-fluid -->
</div>
@endsection
@section('js')
<script>

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)

            $(document).ready(function(){
                toastr.error("{{ $error }}");
        });
        @endforeach
    @endif
</script>
@endsection
