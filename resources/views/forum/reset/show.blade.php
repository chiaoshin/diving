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
                    <img src="./img/login/user1.png" alt="logo" width="100">
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">重設密碼</h1>

                        <form action="{{ route('password.reset') }}" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                            @csrf
                            <input type="hidden" name="token" value="{{ $data['token'] }}">
                            <input type="hidden" name="email" value="{{ $data['email'] }}">
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">🔑</span>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" value="" placeholder="密碼" required autofocus>
                                    <div class="invalid-feedback">
                                        密碼 <b>尚未輸入 或 格式輸入錯誤</b>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">🔐</span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="" placeholder="確認密碼" required autofocus>
                                    <div class="invalid-feedback">
                                        確認密碼 <b>尚未輸入 或 格式輸入錯誤</b>
                                    </div>
                                </div>
                            </div>

                            <div class="passward_visibility">
                                <input type="checkbox" onclick="togglePasswordVisibility()" class="form-check-input" > <label for="passward_visibility" class="form-check-label"><b>顯示密碼</b></label>
                            </div>

                            <div class="align-items-center" align="right">
                                <button type="submit" class="btn btn-primary ms-auto">
                                    送出
                                </button>
                                <button type="reset" class="btn btn-primary ms-auto">重設</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section("script")
<script>
	function togglePasswordVisibility() {
		var x = document.getElementById("password");
		var y = document.getElementById("password-confirm");
		if (x.type === "password" || y.type === "password") {
		  x.type = "text";
		  y.type = "text";
		} else {
		  x.type = "password";
		  y.type = "password";
		}
	  }
</script>
@endsection