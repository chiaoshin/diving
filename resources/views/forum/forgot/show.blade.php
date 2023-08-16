@extends("layouts/app")


@section("head")
{{-- <link href="{{ asset("css/forum.css") }}" rel="stylesheet"> --}}
{{-- <link rel="stylesheet" href="{{ asset("css/login.css") }}"> --}}

@endsection

@section("body")
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-3">
                    <img src="{{ asset('img/login/user.png') }}" alt="logo" width="100">
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">忘記帳號/密碼</h1>

                        <form action="{{ route('forgot') }}" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">📩</span>
                                    </div>
                                    <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email信箱" required autofocus>
                                    <div class="invalid-feedback">
                                        Email信箱 <b>尚未輸入 或 格式輸入錯誤</b>
                                    </div>
                                </div>
                            </div>

                            <div class="align-items-center" align="right">
                                <button type="submit" class="btn btn-primary ms-auto">
                                    查詢
                                </button>
                                <button type="reset" class="btn btn-primary ms-auto">重設</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            還記得你的密碼? <a href="{{ route('login') }}" class="text-blue">返回登入</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section("script")
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>

@endsection