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
                        <h1>Add Attribute</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home.admin') }}"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Add Attribute
                                </li>
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
            <div class="col-xl-6">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Add Attribute</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{ route('add.attribute.admin',['id' => $attributes->id]) }}" id="attributeForm">
                            @csrf
                            <div class="form-group">
                                        <label class="control-label" for="fname">Product name</label>
                                        <div class="mb-2">
                                            <input type="text" id="" class="form-control" value="{{ $attributes->name }}" disabled name="name" placeholder="Enter product name">
                                        </div>
                                        <div class="field_wrapper">
                                            <div>
                                                <input type="text"  class="attribute-input" placeholder="Size" name="size[]"value="{{ old('size') }}"required/>
                                                <input type="number" class="attribute-input"   placeholder="Amount" name="amount[]"value="{{ old('amount') }}" required/>
                                                <a href="javascript:void(0);" class="add_button" title="Add field"><i class="dashicons dashicons-plus-alt"></i></a>
                                            </div>
                                        </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit_category" class="btn btn-outline-success">Add Attribute</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 m-b-30">
                <div class="card card-statistics h-100 m-b-0">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-heading">
                            <h4 class="card-title">Attribute List</h4>
                        </div>
                    </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('attribute.admin.update',['id'=> $attributes->id]) }}" method="post">
                                    @csrf
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attributes->attribute as $valuesize)
                                                <tr>
                                                    <td><input style="display: none" type="hidden"  class="attribute-input-td" placeholder="Size" name="attr[]"value="{{ $valuesize->id }}"/>{{ $valuesize->id }}</td>
                                                    <td><input type="text"  class="attribute-input-td" placeholder="Size" name="size[]"value="{{ $valuesize->size }}"required/></td>
                                                    <td> <input type="number" class="attribute-input-td"   placeholder="Amount" name="amount[]"value="{{ $valuesize->amount}}" required/></td>
                                                    <td style="text-align: center;">
                                                        <button type="submit" id="submit_category" class="btn btn-xs btn-success" style="font-size: 9px;" data-original-title="Update" data-toggle="tooltip">Update</button>
                                                        <a href="{{ route('attribute.admin.delete',['id'=> $valuesize->id]) }}" >
                                                            <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                             </form>

                            </div>
                        </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            var maxField = 5;
            var addButton = $('.add_button');
            var wrapper = $('.field_wrapper');
            var fieldHTML = '<div><input type="text" placeholder="Size" class="attribute-input" name="size[]" value="" required/><input placeholder="Amount" class="attribute-input" type="number" name="amount[]" value=""required/><a href="javascript:void(0);" class="remove_button">  <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a></div>';
            var x = 1;

            $(addButton).click(function(){

                if(x < maxField){
                    x++;
                    $(wrapper).append(fieldHTML);
                }
            });


            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });



        });

</script>
@endsection

