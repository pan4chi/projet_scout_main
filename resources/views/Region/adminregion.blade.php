<!DOCTYPE html>
<html lang="en" class="">
<head>
    @vite('resources/css/app.css') 

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('./assets/css/main.css?v=1628755089081') }}">

    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta name="description" content="Admin One - free Tailwind dashboard">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
    <script>
        // ... (Google Analytics script)
    </script>
</head>

<body>
    <br>
    <center><h1>مرحبا بك عزيزي المدير، يرجى استخدام القائمة للتنقل بشكل أفضل !!!</h1></center>

    @if(Auth::check())
        <h2>المستخدم المتصل :  {{ $userName }}!</h2>
    @endif

    <div id="app">
        <nav id="navbar-main" class="navbar is-fixed-top">
            </div>
        </nav>

        <aside class="aside is-placed-right is-expanded overflow-x-scroll"> 
            <div class="aside-tools">
                <div><a href="/">
                    ASM <b class="font-black">Admin</b>
                </a></div>
            </div>
            <div class="menu is-menu-main"> 
                <p class="menu-label">عام</p>
                <ul class="menu-list">
                    </ul>
                <p class="menu-label">أعضاء</p> 
                </ul>
                <p class="menu-label">فروع</p> 
                </ul>
                        <p class="menu-label">الملف الشخصي</p>
                        <ul class="menu-list">
                            <li class="">
                                <form id="log_out" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                                <a href="#" onclick="document.getElementById('log_out').submit()">
                                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                                    <span class="menu-item-label">تسجيل الخروج</span> 
                                </a>
                            </li>
                        </ul>
                    </ul>
                </ul>
            </div>
        </aside>

        @yield('content') 
    </div>

    <script type="text/javascript" src={{ asset('assets/js/main.min.js?v=1628755089081') }}></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script>
        // ... (Modal and alert scripts)
    </script>
    @yield('script') 
</body>
</html>
