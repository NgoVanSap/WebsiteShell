@extends('adminMaster.master')
@section('content')
<div class="app-main" id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xxl-12 m-b-30">
                <div class="card card-statistics h-100 mb-0">
                    <div class="card-header">
                        <h4 class="card-title">User Comment</h4>
                    </div>
                    @if ($dataComment->count() > 0)
                    <div class="card-body scrollbar scroll_dark mCustomScrollbar _mCS_3 mCS-autoHide" style=" position: relative; overflow: visible;"><div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_3_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                        @foreach ($dataComment as $dataComments)
                        <div class="row align-items-center m-b-20">
                            <div class="col-4 col-xs-2">
                                <div class="bg-img">
                                    <img class="img-fluid mCS_img_loaded" src="{{ asset('assets/img/avtar/02.jpg') }}" alt="user">
                                </div>
                            </div>
                            <div class="col-8 col-xs-6">
                                <h5 class="mb-0">{{ $dataComments->nameCus }}</h5>
                                <span>{{ $dataComments->emailCus }}</span>
                            </div>
                            <div class="col-xs-2 mt-3 mt-xs-0">
                                <div class="ratings" style=" color: #32b432;">
                                    <small> ( {{ $dataComments->countComments }} reviews ) </small>
                                </div>
                            </div>
                            <div class="col-xs-2 mt-3 mt-xs-0">
                                <div class="ratings" >
                                    <a href="{{ route('viewUserCommentDetail.website',['idUser' => $dataComments->comment_user_id]) }}" style=" text-decoration: revert; font-size: 11px; ">Detailed product review</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div></div><div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; height: 0px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
                    @else

                    <div class="icon-wrap col-sm-12 col-md-12 col-xl-12" style="text-align: center;"><i style=" font-size: 60px; " class="dashicons dashicons-welcome-comments"></i><code>No user comments yet</code></div>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
