@extends('adminMaster.master')
<style>
    p.error-text {
         color: #dc3545;
         font-size: 12px;
    }
    input.failError {
        border: 1px solid red !important;
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
                                                    <input type="text" class="form-control error-text username_error" name="username" id="name1" value="{{ old('username' ,$detailMember->username) }}">
                                                    <p class="text-danger error-text username_error"></p>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="email1">Email</label>
                                                    <input type="email" class="form-control error-text email_error" name="email" id="email1" value="{{ old('email' ,$detailMember->email) }}">
                                                    <p class="text-danger error-text email_error"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="add1">Position</label>
                                                <div class="form-group">
                                                    <select class="custom-select custom-select-sm" id="roleAdmin" name="role" required="">
                                                        <option value="2" {{ old('role', $detailMember->role) == 2 ? 'selected' : '' }} >Admin</option>
                                                        <option value="1" {{ old('role', $detailMember->role) == 1 ? 'selected' : '' }}>Staff</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" id="updateMember" data-id="{{  $detailMember->id }}" class="btn btn-outline-success">Update Information</button>
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
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $(document).ready(function () {

        //Update Member
            $("#updateMember").on("click", function (e) {

                    e.preventDefault();

                        var email  = $("input[name='email']").val();
                        var username = $("input[name='username']").val();
                        var role = $('#roleAdmin').find(":selected").val();
                        var id = $(this).data('id')

                        var data = {
                            'email'   :email,
                            'username' : username,
                            'role'    : role,
                            'id'       :id ,
                        };
                        console.log(data)


                    $.ajax({
                        url: "/admin/home/More-members/update",
                        type: "POST",
                        data: data,
                        beforeSend:function () {
                            $(document).find('p.error-text').text('');
                            $(document).find('input.error-text').removeClass('failError');
                        },
                        success: function(res) {
                            if(res.status == 0) {
                                $.each(res.error, function (prefix, value) {
                                $('p.'+prefix+'_error').text(value[0]);
                                $('input.'+prefix+'_error').addClass('failError');
                            });
                            } else {
                                location.reload();
                            }
                        }

                    });
            });

        });
    </script>
@endsection
