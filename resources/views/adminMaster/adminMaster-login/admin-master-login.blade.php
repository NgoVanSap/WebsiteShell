<!DOCTYPE html>
<html lang="en">
    <head>
        @include('adminMaster.adminMaster-login.admin-master-login-header')
    </head>
    <style>
        label.error {
             color: #dc3545;
             font-size: 10px;
        }
    </style>
    <body class="bg-white">
        <div class="app">
            <!-- begin app-wrap -->
            <div class="app-wrap">
                <!--start login contant-->
                <div class="app-contant">
                    <div class="bg-white">
                        <div class="container-fluid p-0">
                            <div class="row no-gutters">
                                <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                    <div class="d-flex align-items-center h-100-vh">
                                        <div class="login p-50">
                                            <h1 class="mb-2">WINKEL Admin</h1>
                                        <p>Welcome WINKEL Admin, please login to your account.</p>
                                            <form action="{{ route('admin.login') }}" method="post" class="mt-3 mt-sm-5" id="loginForm">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Email <span style=" color: #db0404; ">(*)</span></label>
                                                        <input type="text" class="form-control" placeholder="Email" value="{{ old('email') }}" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Password <span style=" color: #db0404; ">(*)</span></label>
                                                        <input type="password" class="form-control" placeholder="Password" value="" name="password">
                                                    </div>
                                                </div>
                                                    <div class="col-12">
                                                        <div class="d-block d-sm-flex  align-items-center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                                                <label class="form-check-label" for="gridCheck">
                                                                    Remember Me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <button type="submit" class="btn btn-primary text-uppercase">Sign In</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                    <div class="row align-items-center h-100">
                                        <div class="col-7 mx-auto ">
                                            <img class="img-fluid" src="{{ URL::to('assets/img/bg/login.svg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end login contant-->
            </div>
            <!-- end app-wrap -->
        </div>
        @include('adminMaster.adminMaster-login.admin-master-login-bottom')
        <script>

                $(document).ready(function() {

                    if ($("#loginForm").length > 0) {

                        $("#loginForm").validate({

                            rules: {
                                email: {
                                    required: true,
                                    email: true

                                },
                                password: {
                                    required: true,
                                }
                            },
                            messages: {
                                email: {
                                    required: "Email cannot be left blank.",
                                    email:"Enter the correct email format",

                                },
                                password: {
                                    required: "Password cannot be left blank.",

                                },
                            },
                            highlight: function(element, errorClass, validClass) {
                                $(element).addClass('is-invalid');
                            },
                            unhighlight: function(element, errorClass, validClass) {
                                $(element).removeClass('is-invalid');
                            }
                        });
                    }
                });
         </script>

    </body>

</html>
