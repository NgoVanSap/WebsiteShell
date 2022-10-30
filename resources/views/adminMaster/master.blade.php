<!DOCTYPE html>
<html lang="en">
    <head>
        @include('adminMaster.layoutAdmin.header')
    </head>
    <body>
        <div class="app">
            <!-- begin app-wrap -->
            <div class="app-wrap">

                <header class="app-header top-bar">
                    <!-- begin navbar -->
                    <nav class="navbar navbar-expand-md">

                        <!-- begin navbar-header -->
                        <div class="navbar-header d-flex align-items-center">
                            <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
                            <a class="navbar-brand" href="{{ route('home.admin') }}">
                                <img src="{{ URL::to('assets/img/logo.png') }}" class="img-fluid logo-desktop" alt="logo" />
                                <img src="{{ URL::to('assets/img/logo-icon.png') }}" class="img-fluid logo-mobile" alt="logo" />
                            </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ti ti-align-left"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="navigation d-flex">
                                <ul class="navbar-nav nav-left">
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" class="nav-link sidebar-toggle">
                                            <i class="ti ti-align-right"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">
                                        <a href="javascript:void(0)" class="nav-link expand">
                                            <i class="icon-size-fullscreen"></i>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav nav-right ml-auto">
                                    <li class="nav-item dropdown user-profile">
                                        <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{ URL::to('assets/img/avtar/02.jpg') }}" alt="avtar-img">
                                            <span class="bg-success user-status"></span>
                                        </a>
                                        <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                            <div class="bg-gradient px-4 py-3">

                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="mr-1">
                                                        <h4 class="text-white mb-0">{{ Auth::guard('admin')->user()->username }}</h4>
                                                        <small class="text-white">{{ Auth::guard('admin')->user()->email }}</small>
                                                    </div>
                                                    <a href="{{ route('admin.logout') }}" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i
                                                     class="zmdi zmdi-power"></i></a>
                                                </div>
                                            </div>
                                            <div class="p-4">
                                                <a class="dropdown-item d-flex nav-link" href="{{ route('home.admin.changePassword') }}">
                                                    <i class=" ti ti-settings pr-2 text-info"></i>
                                                    Change password
                                                </a>
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <a class="bg-light p-3 text-center d-block" href="#">
                                                            <i class="fe fe-mail font-20 text-primary"></i>
                                                            <span class="d-block font-13 mt-2">My messages</span>
                                                        </a>
                                                    </div>
                                                    <div class="col">
                                                        <a class="bg-light p-3 text-center d-block" href="#">
                                                            <i class="fe fe-plus font-20 text-primary"></i>
                                                            <span class="d-block font-13 mt-2">Compose new</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end navigation -->
                    </nav>
                    <!-- end navbar -->
                </header>
                <!-- end app-header -->
                <!-- begin app-container -->
                <div class="app-container">
                    <!-- begin app-nabar -->
                    @include('adminMaster.layoutAdmin.menu')
                    <!-- end app-navbar -->
                    <!-- begin app-main -->
                    @yield('content')
                    <!-- end app-main -->
                </div>
                <!-- end app-container -->
                <!-- begin footer -->
                <footer class="footer">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-left">
                            <p>&copy; Copyright 2019. All rights reserved.</p>
                        </div>
                       <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                            <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                        </div>
                    </div>
                </footer>
                <!-- end footer -->
            </div>
            <!-- end app-wrap -->
        </div>
        @include('adminMaster.layoutAdmin.bottom')
        @yield('js')
    </body>
</html>
