@extends('website.master')
@section('content')
    <div class="error-contant" style=" margin-bottom: 59px;">
        <div class="error-innr">
            <div class="container">
                <div class="row justify-content-center align-items-center" style="justify-content: center; display: flex; ">
                    <div class="col-md-8 text-center">
                        <div class="error-text">
                            <img src="https://freefrontend.com/assets/img/html-css-404-page-templates/HTML-404-Page-with-SVG.png"
                                alt="">
                            <h3 class="m-t-30">What on earth are you doing here!</h3>
                            <p>Well this is awkward, the page you were trying to view does not exist.</p>
                            <a href="{{ route('website.index') }}" style=" margin-top: 20px; " class="btn btn-round btn-primary mt-3">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
