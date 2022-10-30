@extends('website.master')
@section('content')
    <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pages-title-text text-center">
                        <h2>Login - Register</h2>
                        <ul class="text-left">
                            <li><a href="index.html">Home </a></li>
                            <li><span> // </span>Login - Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pages login-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="main-input padding60">
                        <div class="log-title">
                            <h3><strong>registered customers</strong></h3>
                        </div>
                        <div class="login-text">
                            <div class="custom-input">
                                <p>If you have an account with us, Please log in!</p>
                                <form action="{{ route('createLogin.website') }}" method="post" id="loginForm">
                                    @csrf
                                    <div class="margin-bottom-login">
                                        <input type="text" name="emailCus" placeholder="Email">
                                        <p class="text-danger error-text emailCus_error"></p>
                                    </div>
                                    <div class="margin-bottom-login">
                                        <input type="password" name="password" placeholder="Password">
                                        <p class="text-danger error-text password_error"></p>
                                    </div>
                                    <a class="forget" href="#">Forget your password?</a>
                                    <div class="submit-text">
                                        <button type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="main-input padding60 new-customer">
                        <div class="log-title">
                            <h3><strong>new customers</strong></h3>
                        </div>
                        <div class="custom-input">
                            <form action="{{ route('createRegister.website') }}" method="post" id="main_form">
                                @csrf
                                <div class="margin-bottom-register">
                                    <input type="text" name="usernameCus" placeholder="Name here..">
                                    <span class="text-danger error-text usernameCus_error"></span>
                                </div>

                                <div class="margin-bottom-register">
                                    <input type="text" name="emailCus" placeholder="Email Address..">
                                    <span class="text-danger error-text emailCus_error"></span>
                                </div>

                                <div class="margin-bottom-register">
                                    <input type="text" name="phoneCus" placeholder="Phone Number..">
                                    <span class="text-danger error-text phoneCus_error"></span>
                                </div>

                               <div class="margin-bottom-register">
                                    <input type="password" name="password" placeholder="Password">
                                    <span class="text-danger error-text password_error"></span>
                               </div>

                               <div class="margin-bottom-register">
                                    <input type="password" name="re_passwordCus" placeholder="Confirm Password">
                                    <span class="text-danger error-text re_passwordCus_error"></span>
                               </div>

                                <div class="submit-text coupon">
                                    <button type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script>

    $("#main_form").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url:$(this).attr("action"),
            method:$(this).attr("method"),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function () {
                $(document).find('span.error-text').text('');
            },

            success:function (data) {

                if(data.status == 0) {
                    $.each(data.error, function (prefix, value) {
                        $('span.'+prefix+'_error').text(value[0]);
                    });
                } else {
                    $("#main_form")[0].reset();
                    Toastify({
                        text: data.success,
                        duration: 2000,
                        className: "infoCustomerToast",
                        newWindow: true,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                    }).showToast();
                }
            },


        });

    });


    $("#loginForm").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url:$(this).attr("action"),
            method:$(this).attr("method"),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function () {
                $(document).find('p.error-text').text('');
            },

            success:function (data) {

                if(data.status == 0) {
                    $.each(data.error, function (prefix, value) {
                        $('p.'+prefix+'_error').text(value[0]);
                    });
                } else if(data.status == 1) {
                    window.location.href = "/";

                    $("#loginForm")[0].reset();
                    Toastify({
                        text: data.success,
                        duration: 2000,
                        className: "infoCustomerToast",
                        newWindow: true,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                    }).showToast();

                } else {
                    Toastify({
                        text: data.error,
                        duration: 2000,
                        className: "infoCustomerToastError",
                        newWindow: true,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                    }).showToast();
                }
            },


        });

    });



</script>
@endsection
