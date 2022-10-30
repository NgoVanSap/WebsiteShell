@extends('adminMaster.master')
<style>
    label.error {
         color: #dc3545;
         font-size: 10px;
    }
</style>
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
                        <h1>Edit Member </h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home.admin') }}"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Edit Member Settings
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Account Settings</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->

        <!--mail-Compose-contant-start-->
        <div class="row account-contant">
            <div class="col-12">
                <div class="card card-statistics">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-xl-3 pb-xl-0 pb-5 border-right">
                                <div class="page-account-profil pt-5">
                                    <div class="profile-img text-center rounded-circle">
                                        <div class="pt-5">
                                            <div class="bg-img m-auto">
                                                <img src="{{ URL::to('assets/img/avtar/01.jpg') }}" class="img-fluid" alt="users-avatar">
                                            </div>
                                            <div class="profile pt-4">
                                                <h4 class="mb-1">{{ $detailMember->username }}</h4>
                                                <p>{{ $detailMember->role == 2 ? 'Admin' : 'Staff' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-btn text-center" style="margin-top: 40px;">
                                        <div>
                                            <a href="{{ route('home.admin.deleteMember',['id' => $detailMember->id]) }}"class="btn btn-outline-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-md-6 col-12 border-t border-right">
                                <div class="page-account-form">
                                    <div class="form-titel border-bottom p-3">
                                        <h5 class="mb-0 py-2">Edit Member Settings</h5>
                                    </div>
                                    <div class="p-4">
                                        <form action="{{ route('home.admin.updateMember',['id'  => $detailMember->id]) }}" method="post" id="form">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="name1">Full Name</label>
                                                    <input type="text" class="form-control" name="username" id="name1" value="{{ old('username' ,$detailMember->username) }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="email1">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email1" value="{{ old('email' ,$detailMember->email) }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="add1">Position</label>
                                                <div class="form-group">
                                                    <select class="custom-select custom-select-sm" name="role" required="">
                                                        <option value="2" {{ old('role', $detailMember->role) == 2 ? 'selected' : '' }} >Admin</option>
                                                        <option value="1" {{ old('role', $detailMember->role) == 1 ? 'selected' : '' }}>Staff</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-outline-success">Update Information</button>
                                            <a href="{{ route('home.admin.Moremembers') }}" class="btn btn-outline-danger">Cancel</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--mail-Compose-contant-end-->
    </div>
    <!-- end container-fluid -->
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            if($("#form").length > 0) {
                $("#form").validate({
                rules : {
                   username : {
                       required : true,
                   },
                   email : {
                       required : true,
                       email    : true,
                   }
                },
                messages : {
                    username : {
                        required : "User Name cannot be left blank.",
                    },
                    email : {
                        required : "Email cannot be blank.",
                        email    : "Email must be in the correct format.",
                    },
                },

                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
             });
            }

        });
    </script>
@endsection
