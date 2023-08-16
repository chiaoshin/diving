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
                    <div class="card-body p-4">
                        <h2 class="fs-4 card-title fw-bold mb-3">註冊會員</h2>

                        <form name="regForm" action="{{ route('register') }}" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                            @csrf
                            @if ($errors->any())
									<div class="alert alert-danger">
									@foreach ($errors->all() as $error)
										<div>{{ $error }}</div>
									@endforeach
									</div>
								@endif
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">🔒︎</span>
                                    </div>
                                    <input id="name" type="text" class="form-control" name="name" value="" placeholder="使用者名稱" required autofocus>
                                    <div class="invalid-feedback">
                                        使用者名稱 <b>尚未輸入</b>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">✉</span>
                                    </div>
                                    <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email信箱" required>
                                    <div class="invalid-feedback">
                                        Email信箱 <b>尚未輸入 或 格式輸入錯誤</b>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">🗝</span>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="密碼" required>
                                    <div class="invalid-feedback">
                                        密碼 <b>尚未輸入</b>
                                    </div>
                                </div>
                            </div>

                            <p class="form-text text-muted mb-2">
                                上述資料為<font color="EA0000"><b>必填</b></font>，請確認後按下註冊按鈕。
                            </p>

                            <div class="passward_visibility">
                                <input type="checkbox" onclick="togglePasswordVisibility()" class="form-check-input" > <label for="passward_visibility" class="form-check-label"><b>顯示密碼</b></label>
                            </div>

                            <div class="align-items-center" align="right">
                                <button type="submit" class="btn btn-primary ms-auto" onClick="check_data()">註冊</button>
                                <button type="reset" class="btn btn-primary ms-auto">重設</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            已經擁有帳號? <a href="{{ route('login') }}" class="text-blue">返回登入</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section("script")
<script>function togglePasswordVisibility() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }</script>
@endsection