@extends('adminMaster.master')
@section('content')
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
       <div class="row">
        <div class="col-xl-3 col-xxl-3 m-b-30">
                <div class="card card-statistics mb-0 widget-support-list">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Notifications</h4>
                        </div>
                    </div>
            <div class="csss" style=" height: 511px; overflow-x: scroll; ">
                    @foreach ( $dataDetailCommentList as $dataDetailCommentLists )
                        <div class="">
                            <a href="{{ route('userCommentDetail.admin',['id' => $dataDetailCommentLists->id,'idUser' => $dataDetailCommentLists->comment_user_id]) }}">
                                <div class="media"style="border-bottom: 1px solid #dee2e6;overflow: hidden;padding: 12px;">
                                    <div class="dot-online">
                                        <div class="bg-img mr-2">
                                            <img class="img-fluid" src="{{ asset('imgProduct/'.$dataDetailCommentLists->image) }}" alt="listwidget-img">
                                        </div>
                                    </div>
                                    <div class="media-body ml-2">
                                        @php
                                            $start = \Carbon\Carbon::parse($dataDetailCommentLists->created_at);
                                            $now = \Carbon\Carbon::now();
                                            $days_count = $start->diffInDays($now);
                                        @endphp
                                        <h4 class="mb-0" style="font-size: 12px !important;">{{ $dataDetailCommentLists->name }}</h4>
                                        <p style=" overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: 255px; ">{{ $dataDetailCommentLists->comment_information }}</p>
                                        <span><small>@if ($days_count == 0)
                                            Today
                                        @else
                                            {{ $days_count}} Day
                                        @endif
                                        </small></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-xxl-9 m-b-30" style=" background: white; padding: 32px; ">
            <div class="media align-items-center">
                <div class="bg-img mr-3">
                    <img src="{{ asset('imgProduct/'.$dataDetailCommentList[0]->image) }}" class="img-fluid" alt="user">
                </div>
                <div>
                    <h4 class="mb-0">{{  $dataDetailCommentList[0]->comment_user_name }}</h4>
                    @php
                        $start = \Carbon\Carbon::parse($dataDetailCommentList[0]->created_at);
                        $now = \Carbon\Carbon::now();
                        $days_count = $start->diffInDays($now);
                    @endphp
                    <p>
                        @if ($days_count == 0)
                        Today
                        @else
                            {{ $days_count}} Day
                        @endif
                </p>
                </div>
            </div>
            <div class="mt-4 d-flex" style=" justify-content: end; ">
                <div class="d-flex">
                    <a href="#"></a>
                </div>
            </div>
            <div style="margin-top: 30px;margin-bottom: 56px;">
                <p class="my-4">{{ $dataDetailCommentList[0]->comment_information }}</p>
            </div>

            <div class="profile-btn text-center" style="margin-top: 40px;position: absolute;bottom: 15px;width: 98%;">
                <div>
                    <a href="{{ route('viewUserCommentDetailDelete.admin',['id' => $dataDetailCommentList[0]->id,'idUser' => $dataDetailCommentList[0]->comment_user_id] ) }}" class="btn btn-outline-danger"><i class="fa fa-trash"  title="" data-original-title="Delete"></i></a>
                </div>
            </div>
        </div>
       </div>
    </div>
    <!-- end container-fluid -->
</div>
@endsection
