<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>

    <title>ระบบฐานข้อมูลงานวิจัย</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script type="text/javascript" src="/media/js/site.js?_=64232ba754b2748258f2324e5f9e21f9"></script>
	<script type="text/javascript" src="/media/js/dynamic.php?comments-page=examples%2Fstyling%2Fbootstrap5.html" async></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/demo.js"></script>
</head>

<body>

    <img id="" src="{{ asset('image/Header.jpeg') }}" width="100%" height="">
    <div id="app">
        <nav class="navbar sticky-top navbar-expand-md navbar-dark shadow-sm"
            style="background-image:url({{ asset('image/Header-two.jpeg') }}">
            <div class="container-fluid">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link mb-0 h5" href="{{ url('/') }}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mb-0 h5" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                วิจัย
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="/project">โครงการขอทุน</a>
                                <a class="dropdown-item" href="/contract">จัดทำสัญญาวิจัย</a>
                                <a class="dropdown-item" href="/progress">รายงานผลดำเนินงาน</a>
                                <a class="dropdown-item" >หลักฐานการเผยแพร่</a>
                                <a class="dropdown-item" >รายงานตามความต้องการ</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link mb-0 h5" href="/person">นักวิจัย/ผู้เชี่ยวชาญ</a>
                        </li>
                        <li class="nav-item" id="li2">
                            <a class="nav-link mb-0 h5" >ทุนวิจัย</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 h5" >เผยแพร่</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mb-0 h5"  id="navbarDropdownPages"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                รายงานสรุป
                            </a>

                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            @if (Route::has('login'))

                                @auth

                                @else
                                    <a href="{{ route('login') }}" class="nav-link">สำหรับเจ้าหน้าที่</a>

                                    @if (Route::has('register'))
                                        {{-- <a href="{{ route('register') }}" class="ml-4 nav-link">Register</a> --}}
                                    @endif
                                @endauth

                            @endif
                        </li>

                        @guest
                            @php
                                $http_build_query = http_build_query([
                                    'client_id' => env('OAUTH_CLIENT_ID'),
                                    'redirect_uri' => env('OAUTH_CLIENT_REDIRECT_URI'),
                                    'response_type' => 'code',
                                    'scope' => '*',
                                ]);
                                $URI = 'https://passport.yru.ac.th/oauth/authorize?' . $http_build_query;
                            @endphp
                            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 padding">
                                <a href="{{ $URI }}" class="button">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    <span>เข้าสู่ระบบ</span>
                                </a>
                            </div>

                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle button" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            <span>ออกจากระบบ</span>
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>


    @yield('script')
</body>

</html>
