<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>潛水家_潛水資訊服務網</title>

    <!-- header css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- header icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- tabs temples -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.coml/css?family=Playfair+Display:400,900&display=swap" rel="stylesheet">

    @yield('head')
</head>

<body class="d-flex" style="flex-direction: column;">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/Logo2.png') }}" alt="Logo" width="30" height="24">
                <span class="fw-bold">潛水家_潛水資訊服務網 Diving</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    {{-- 登入，呈現使用者名稱 --}}
                    {{-- @if(auth()->check())
                    <li class="nav-item">
                        <p>{{  auth()->user()->name}} 您好</p>
                    </li>
                    @endif --}}
                    <li class="nav-item">
                        <a class="fw-bold d-flex nav-link active" aria-current="page" href="/"><span class="material-symbols-sharp">home</span>首頁 Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="fw-bold d-flex nav-link" href="#"><span class="material-symbols-sharp">partly_cloudy_day</span>天氣</a>
                    </li>
                    <li class="nav-item">
                        <a class="fw-bold d-flex nav-link" href="#"><span class="material-symbols-sharp">map</span>地圖展示</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="fw-bold d-flex nav-link" href="{{ route('forum.index') }}"><span class="material-symbols-sharp">group</span>討論區</a>
                    </li>
                    <li class="nav-item">
                        <a class="fw-bold d-flex nav-link" href="{{ route('partner.index') }}"><span class="material-symbols-sharp">group_add</span>尋找潛伴</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-0" id="content" style="flex-grow: 2;">
        @yield('body')
    </div>
    <div class="footer d-flex" id="footer" style="flex-grow: 1;">
        <div class="container-fluid m-auto">
            <span>
                <p class="text-center text-white m-0">Copyright @ 2023 Diving. All rights reserved.</p>
            </span>
        </div>
    </div>
</body>

@yield('script')

</html>