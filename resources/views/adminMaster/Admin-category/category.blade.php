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
                        <h1>CATEGORY</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home.admin') }}"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Category
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Create Directory</li>
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
                            <h4 class="card-title">Create Directory </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="#">
                            <div class="form-group">
                                <label class="control-label" for="fname">Category name <span style=" color: #db0404; ">(*)</span></label>
                                <div class="mb-2">
                                    <input type="text" id="namecategory" class="form-control" id="fname" name="namecategory" placeholder="Category name">
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="javascript:void(0);" id = "submit_category" type="button" class="btn btn-outline-success">Add category</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">
                                Edit Category</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="#">
                            <input type="hidden" id="namecategory_id" value="">
                            <div class="form-group">
                                <label class="control-label" for="fname">Category name to edit <span style=" color: #db0404; ">(*)</span></label>
                                <div class="mb-2">
                                    <input type="text" id="namecategory_edit" class="form-control" name="namecategory" placeholder="Category name to edit">
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="javascript:void(0);" id = "btn-namecategory_edit" type="button" class="btn btn-outline-warning">Edit Category</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <div class="col-lg-6">
                    <div class="card card-statistics h-100 mb-0">
                        <div class="card-header">
                            <h4 class="card-title">List of posted categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Category name</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mytable">

                                    </tbody>
                                </table>
                            </div>
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
        $(document).ready(function() {

        //LOAD DATA
        function getData() {
                $.ajax({
                url: "/admin/home/danh-muc/get-data-ajax",
                type: "GET",
                success: function ($data) {
                    let _html = "";
                    let data = $data.data;
                    data.reverse();
                    data.forEach((x) => {
                        _html += '<tr id="Garrett Winters">';
                        _html += '<td>'+ x.id +'</td>';
                        _html += '<td>'+ x.namecategory +'</td>';
                        _html += '<td style="text-align: center;">';
                        _html += '<a style="cursor: pointer" class="btn-edit mr-2" data-id='+ x.id +'>';
                        _html += '<i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" aria-describedby="tooltip114525" data-original-title="Edit"></i>';
                        _html += '</a>';
                        _html += '<a style="cursor: pointer"  class="delete"  data-id='+ x.id +' >';
                        _html += '<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>';
                        _html += '</a>';
                        _html += '</td>';
                        _html += '</tr>';
                    });
                    $('#mytable').html(_html);
                },
                });
        }
        getData();


        //POST DATA
        $("#submit_category").click(function (e) {

                e.preventDefault();

                var namecategory = $("input[name=namecategory]").val();

                $.ajax({
                    url: "/admin/home/danh-muc/Ajax",
                    type: "POST",
                    data: {
                        namecategory:namecategory
                    },
                    success: function (res) {
                    if(res.trangThai == true) {
                        toastr.success('Add category successfully');
                        $("#namecategory").val('');
                        getData();
                    }
                    },
                    error: function (res) {
                        var errorList = res.responseJSON.errors;
                        $.each(errorList, function (key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
        });

        //DELETE DATA
        $("body").on("click", ".delete", function () {
            var checkConfirm = confirm("Deleting a category will delete all products with the same category?"  );
            if(checkConfirm == true) {
                var getID = $(this).data("id");
            $.ajax({
                url     : "/admin/home/danh-muc/deleteAjax/" + getID,
                type    : "GET",
                success : function ($res) {
                    if ($res.status == true) {
                        toastr.success("Delete successfully");
                       $("#namecategory_edit").val('');
                        getData();
                    } else {
                        toastr.error("Delete failed");
                    }
                },
            });
            }

        });

        //EDIT DATA
        $("body").on("click",".btn-edit",function () {
            var getID = $(this).data("id");

            $.ajax({
                url     : "/admin/home/danh-muc/editAjax/" + getID,
                type    : "GET",
                success : function ($res) {
                    console.log($res);
                    if($res.status == true) {
                        $("#namecategory_id").val($res.data.id);
                        $("#namecategory_edit").val($res.data.namecategory);
                    }else {
                    toastr.error('Edit thất bai');
                    }
                }
            });
        });

        //UPDATE DATA
        $("#btn-namecategory_edit").on("click", function () {


            var id           = $("#namecategory_id").val();
            var namecategory = $("#namecategory_edit").val();

            var data = {
                'id'           :id,
                'namecategory' : namecategory,
            };

            $.ajax({
                url: "/admin/home/danh-muc/update",
                type: "POST",
                data: data,
                success: function (res) {
                   if(res.data) {
                       toastr.success('Edit successfully');
                       $("#namecategory_edit").val('');
                       getData();
                   } else {
                       toastr.error('Edit failed');
                   }
                },
                error: function (res) {
                    var errorList = res.responseJSON.errors;
                    $.each(errorList, function (key, value) {
                        toastr.error(value[0]);
                    });
                },
            });
        });


    });
    </script>
@endsection
