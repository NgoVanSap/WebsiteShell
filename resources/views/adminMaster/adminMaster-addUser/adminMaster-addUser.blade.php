@extends('adminMaster.master')
@section('content')
<div class="app-main" id="main">
    <div class="container-fluid">
        <div class="col-xxl-12 mb-30">
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="register p-5">
                                        <h1 class="mb-2">More members</h1>
                                        <p>Welcome, Please create your account.</p>
                                        <form action="{{ route('home.admin.Moremembers') }}" method="post"class="mt-2 mt-sm-5">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Email <span style=" color: #db0404; ">(*)</span></label>
                                                        <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Username <span style=" color: #db0404; ">(*)</span></label>
                                                        <input type="text" class="form-control" value="{{old('username')}}" name="username" placeholder="Username">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Password <span style=" color: #db0404; ">(*)</span></label>
                                                        <input type="password" class="form-control" value="{{old('password')}}" name="password" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Re-Password <span style=" color: #db0404; ">(*)</span></label>
                                                        <input type="password" class="form-control" value="{{old('re_password')}}" name="re_password" placeholder="Re-Password">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <select class="custom-select custom-select-sm" name="role" required>
                                                            <option value="2" @if (old('role') == 2) selected  @endif >Admin</option>
                                                            <option value="1" @if (old('role') == 1) selected  @endif>Staff</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button class="btn btn-primary text-uppercase">More members</button>
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
        </div>
        <div class="card card-statistics clients-contant">
            <div class="card-header">
                <div class="d-xxs-flex justify-content-between align-items-center">
                    <div class="card-heading">
                        <h4 class="card-title">Clients</h4>
                    </div>
                    <div class="mt-xxs-0 mt-3 btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-sm btn-round  btn-primary">
                            <input type="radio" name="options" id="option1" checked="">
                            Today
                        </label>
                        <label class="btn btn-sm btn-outline-primary active">
                            <input type="radio" name="options" id="option2">
                            Week
                        </label>
                        <label class="btn btn-sm btn-round btn-outline-primary">
                            <input type="radio" name="options" id="option3"> Month
                        </label>
                    </div>
                </div>
            </div>
            <div class="card-body py-0 table-responsive">
                <table class="table clients-contant-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">User name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Member's position</th>
                            <th scope="col">Edit &amp; Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $dataListMember as $member )
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-img mr-4" style="position: relative;">
                                            <img class="img-fluid mCS_img_loaded" src="{{ URL::to('assets/img/avtar/02.jpg') }}" alt="user">
                                            @if (Auth::guard('admin')->check())
                                                <i class="bg-img-status bg-success"></i>
                                            @endif
                                    </div>

                                    <p class="font-weight-bold">{{ $member->username }}</p>
                                </div>
                            </td>
                            <td>{{ $member->email }}</td>
                            @php
                                    if ($member->role == 3) {
                                        $userMember = 'Admin Master';

                                    } elseif ($member->role == 2){
                                        $userMember = 'Admin';

                                    } else {
                                        $userMember = 'Staff';

                                    }
                            @endphp
                            @if ($member->role >= 2)
                            <td>
                                <a href="javascript:void(0)" class="dot"></a>
                                <span>{{ $userMember }}</span>
                            </td>
                            @else
                            <td>
                                <a href="javascript:void(0)" class="dot bg-primary"></a>
                                <span>{{ $userMember }}</span>
                            </td>
                            @endif
                            <td>
                                @if (Auth::guard('admin')->user()->role >= 3)
                                <a href="{{ route('home.admin.editDetailMember',['id' => $member->id ])}}" class="btn btn-icon btn-outline-primary btn-round mr-2 mb-2 mb-sm-0 "><i class="ti ti-pencil"></i></a>
                                @else
                                <a class="btn btn-icon btn-outline-primary btn-round mr-2 mb-2 mb-sm-0 toartsErrorEditMember "><i class="ti ti-pencil"></i></a>
                                @endif
                                @if (Auth::guard('admin')->user()->role >= 3)

                                <a href="{{ route('home.admin.deleteMember',['id' => $member->id]) }}" class="btn btn-icon btn-outline-danger btn-round"><i class="ti ti-close"></i></a>

                                @else
                                <a class="btn btn-icon btn-outline-danger btn-round toartsErrorDeleteMember"><i class="ti ti-close"></i></a>

                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
</div>
@endsection
@section('js')
<script>

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
            $(document).ready(function(){
                Command: toastr["error"]("{{ $error }}");
        });
        @endforeach
    @endif
</script>
<script>
    $(document).ready(function(){

        $("body").on("click", ".editMember", function() {
            var getID = $(this).data("id");

            $.ajax({
                url :"/admin/home/More-members/edit/" + getID,
                type : "GET",
                success : function ($res) {
                    if($res.status == true) {
                      $("#member_id").val($res.data.id);
                      $("#role_id").val($res.data.role).change();
                    } else {
                    toastr.error('Edit failed.');
                    }
                }
            });
        });


        //Edit Member Errror
        $(".toartsErrorEditMember").click(function () {
            toastr.error('You do not have the right to Edit Member.');
        });

        $(".toartsErrorDeleteMember").click(function () {
            toastr.error('You do not have permission to Delete Member');
        });
    });

</script>
@endsection
