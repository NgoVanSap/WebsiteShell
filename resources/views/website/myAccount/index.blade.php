@extends('website.master')
@section('content')
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>My Account</h2>
                    <ul class="text-left">
                        <li><a href="index.html">Home </a></li>
                        <li><span> // </span>My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="pages my-account-page section-padding">
    <div class="container">
        <div class="row">
            {{-- <div class="col-xs-12 col-sm-6">
                <div class="padding60">
                    <div class="log-title">
                        <h3><strong>My Account</strong></h3>
                    </div>
                    <div class="prament-area main-input">
                        <ul class="panel-group" id="accordion">
                            <li class="panel">
                                <div class="account-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse4" aria-expanded="true">
                                    <label>
                                        <input type="radio" checked="" value="forever" name="rememberme">
                                        My personal information
                                    </label>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse in" aria-expanded="true" style="">
                                    <div class="single-log-info">
                                        <div class="bulling-title">
                                            <h5>Your personal information</h5>
                                            <p>Please be sure to update your personal information if it has changed</p>
                                        </div>
                                        <form action="{{ route('changeMyAccount.website') }}" method="post">
                                            @csrf
                                            <div class="mr-mrs">
                                                <label class="social-label">
                                                    <sup>*</sup> Social title
                                                </label>
                                                <label>
                                                    <input type="radio" value="1" {{ old('genre', Auth::guard('customer')->user()->genre)== '1' ? 'checked' : '' }} name="genre">
                                                    Mr.
                                                </label>
                                                <label>
                                                    <input type="radio" value="2" {{ old('genre', Auth::guard('customer')->user()->genre)== '2' ? 'checked' : '' }} name="genre">
                                                    Msr.
                                                </label>
                                            </div>
                                            <div class="custom-input">
                                                <form action="mail.php" method="post">
                                                    <input value="{{ Auth::guard('customer')->user()->usernameCus }}" type="text" name="usernameCus" placeholder="Your Full Name">
                                                    <input value="{{ Auth::guard('customer')->user()->emailCus }}"type="text" name="emailCus" placeholder="Email Address">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                        <label>Date of Birth</label>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <input name="dateCus" type="date">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                        <label>Change Password</label>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <input type="password" placeholder="Current Password" name="password" name="old_password' value="">
                                                                    <input type="password" placeholder="New Password" name="new_password" >
                                                                    <input type="password" placeholder="Confirm Password" name="confirm_password" >

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="sing-checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="rememberme">
                                                                    Sign up for our newsletter!
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="submit-text text-left">
                                                        <button type="submit" value="submit form">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li class="panel">
                                <div class="account-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse4" aria-expanded="true">
                                    <label>
                                        <input type="radio" value="forever" name="rememberme">
                                        My personal information
                                    </label>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse in" aria-expanded="true" style="">
                                    <div class="single-log-info">
                                        <div class="bulling-title">
                                            <h5>Your personal information</h5>
                                            <p>Please be sure to update your personal information if it has changed</p>
                                        </div>
                                        <form action="{{ route('changeMyAccount.website') }}" method="post">
                                            @csrf
                                            <div class="mr-mrs">
                                                <label class="social-label">
                                                    <sup>*</sup> Social title
                                                </label>
                                                <label>
                                                    <input type="radio" value="1" {{ old('genre', Auth::guard('customer')->user()->genre)== '1' ? 'checked' : '' }} name="genre">
                                                    Mr.
                                                </label>
                                                <label>
                                                    <input type="radio" value="2" {{ old('genre', Auth::guard('customer')->user()->genre)== '2' ? 'checked' : '' }} name="genre">
                                                    Msr.
                                                </label>
                                            </div>
                                            <div class="custom-input">
                                                <form action="mail.php" method="post">
                                                    <input value="{{ Auth::guard('customer')->user()->usernameCus }}" type="text" name="usernameCus" placeholder="Your Full Name">
                                                    <input value="{{ Auth::guard('customer')->user()->emailCus }}"type="text" name="emailCus" placeholder="Email Address">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                        <label>Date of Birth</label>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <input name="dateCus" type="date">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                        <label>Change Password</label>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <input type="password" placeholder="Current Password" name="password" name="old_password' value="">
                                                                    <input type="password" placeholder="New Password" name="new_password" >
                                                                    <input type="password" placeholder="Confirm Password" name="confirm_password" >

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="sing-checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="rememberme">
                                                                    Sign up for our newsletter!
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="submit-text text-left">
                                                        <button type="submit" value="submit form">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            <div class="col-xs-12 col-sm-6">
                <div class="padding60">
                    <div class="log-title">
                        <h3><strong>My Account</strong></h3>
                    </div>
                    <div class="prament-area main-input">
                        <ul class="panel-group" id="accordion">
                            <li class="panel">
                                <div class="account-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
                                    <label>
                                        <input type="radio" checked="" value="forever" name="rememberme">
                                        My personal information
                                    </label>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="single-log-info">
                                        <div class="bulling-title">
                                            <h5>Your personal information</h5>
                                            <p>Please be sure to update your personal information if it has changed</p>
                                        </div>
                                        <form action="{{ route('changeMyAccount.website') }}" method="post">
                                            @csrf
                                            <div class="mr-mrs">
                                                <label class="social-label">
                                                    <sup>*</sup> Social title
                                                </label>
                                                <label>
                                                    <input type="radio" value="1" {{ old('genre', Auth::guard('customer')->user()->genre)== '1' ? 'checked' : '' }} name="genre">
                                                    Mr.
                                                </label>
                                                <label>
                                                    <input type="radio" value="2" {{ old('genre', Auth::guard('customer')->user()->genre)== '2' ? 'checked' : '' }} name="genre">
                                                    Msr.
                                                </label>
                                            </div>
                                            <div class="custom-input">
                                                <div class="margin-bottom-register">
                                                    <input style=" margin-bottom: 0 !important; " value="{{ Auth::guard('customer')->user()->usernameCus }}" type="text" id="usernameCus" placeholder="Your Full Name">
                                                    <span class="text-danger error-text usernameCus_error"></span>
                                                </div>

                                                <div class="margin-bottom-register">
                                                    <input style=" margin-bottom: 0 !important; " value="{{ Auth::guard('customer')->user()->emailCus }}" type="text" id="emailCus" placeholder="Email Address">
                                                    <span class="text-danger error-text emailCus_error"></span>
                                                </div>
                                                <div class="margin-bottom-register">
                                                    <input style=" margin-bottom: 0 !important; " value="{{ Auth::guard('customer')->user()->phoneCus }}" type="text" name="phoneCus" placeholder="Email Address">
                                                    <span class="text-danger error-text phoneCus_error"></span>
                                                </div>



                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                        <label>Date of Birth</label>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <input name="dateCus" type="date">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="submit-text text-left">
                                                        <button type="submit" id="submit_MyAccount">Save</button>
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li class="panel">
                                <div class="account-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse4">
                                    <label>
                                        <input type="radio" value="forever" name="rememberme">
                                       Change Password
                                    </label>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse">
                                    <div class="single-log-info">
                                        <div class="bulling-title">
                                            <h5>Change Password</h5>
                                            <p>Please be sure to update your personal information if it has changed</p>
                                        </div>
                                        <div class="custom-input">
                                            <form action="mail.php" method="post">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                    <label>Change Password</label>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="margin-bottom-register">
                                                                    <input style=" margin-bottom: 0 !important; " type="password" placeholder="Current Password"  name="old_password1">
                                                                    <span class="text-danger error-text old_password_error"></span>
                                                                </div>
                                                                <div class="margin-bottom-register">
                                                                    <input style=" margin-bottom: 0 !important; " type="password" placeholder="New Password" name="new_password1" >
                                                                    <span class="text-danger error-text new_password_error"></span>
                                                                </div>
                                                                <div class="margin-bottom-register">
                                                                    <input style=" margin-bottom: 0 !important; " type="password" placeholder="Confirm Password" name="confirm_password1" >
                                                                    <span class="text-danger error-text confirm_password_error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="sing-checkbox">
                                                            <label>
                                                                <input type="checkbox" name="rememberme">
                                                                Sign up for our newsletter!
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submit-text text-left">
                                                    <button type="submit" id="submit_MyAccount1" >Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="my-right-side">
                    <a href="{{ route('viewWishListProduct.website') }}">My wishlists</a>
                    <a href="{{ route('viewCartProduct.website') }}">My Cart</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
