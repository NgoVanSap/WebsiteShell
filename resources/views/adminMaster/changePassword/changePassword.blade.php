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
                        <h1>Change Password </h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="http://127.0.0.1:8000/admin/home"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Edit Change Password
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
                                                <img src="http://127.0.0.1:8000/assets/img/avtar/01.jpg" class="img-fluid" alt="users-avatar">
                                            </div>
                                            <div class="profile pt-4">
                                                <h4 class="mb-1">{{ Auth::guard('admin')->user()->username }}</h4>
                                                <p>
                                                @if (Auth::guard('admin')->user()->role >= 3)
                                                AdminMaster
                                                @elseif (Auth::guard('admin')->user()->role == 2)
                                                Admin
                                                @else
                                                Staff
                                                @endif
                                            </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-md-6 col-12 border-t border-right">
                                <div class="page-account-form">
                                    <div class="form-titel border-bottom p-3">
                                        <h5 class="mb-0 py-2">Change Password</h5>
                                    </div>
                                    <div class="p-4">
                                        <form action="{{ route('home.admin.changePasswordUpdate') }}" method="post" id="form" novalidate="novalidate">
                                            @csrf
                                                <div class="form-group col-md-12">
                                                    <label for="name1">Curent password</label>
                                                    <input type="password" class="form-control boder-solid old_password_error" name="old_password"  value="">
                                                    <span class="text-danger error-text old_password_error" style=" font-size: 11px;font-weight: 600!important "></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="email1">New password</label>
                                                    <input type="password" class="form-control boder-solid new_password_error" name="new_password"  value="">
                                                    <span class="text-danger error-text new_password_error" style=" font-size: 11px;font-weight: 600!important "></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="email1">Confirm new password</label>
                                                    <input type="password" class="form-control boder-solid confirm_password_error" name="confirm_password"  value="">
                                                    <span class="text-danger error-text confirm_password_error" style=" font-size: 11px; font-weight: 600!important"></span>

                                                </div>
                                            <button type="submit" id="changePassword" style=" margin-left: 15px;" class="btn btn-outline-success">Change Password</button>
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
