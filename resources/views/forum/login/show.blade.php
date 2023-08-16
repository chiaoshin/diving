@extends("layouts/app")


@section("head")
{{-- <link href="{{ asset("css/forum.css") }}" rel="stylesheet"> --}}
{{-- <link rel="stylesheet" href="{{ asset("css/login.css") }}"> --}}

@endsection

@section("body")
<body style='background:#A9C2D3;'>
    <section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-3">
						<img src="{{ asset('img/login/user.png') }}" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h2 class="fs-4 card-title fw-bold mb-4">登入</h2>
							<form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate="" autocomplete="off">
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
										<input id="eamil" type="eamil" class="form-control input_pass" name="email" value="" placeholder="Email信箱" required autofocus>
										<div class="invalid-feedback">
											Email信箱 <b>尚未輸入</b>
										</div>
									</div>
								</div>

								<div class="mb-3">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">🗝</span>
										</div>
										<input id="password" type="password" class="form-control input_pass" name="password" placeholder="密碼" required>
										<div class="invalid-feedback">
											密碼 <b>尚未輸入</b>
										</div>
									</div>
								</div>
								<div class="d-flex align-items-center">
									{{-- <div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label"><b>記住我</b></label>
									</div> --}}
									<div class="passward_visibility">
										<input type="checkbox" onclick="myFunction()" class="form-check-input" > <label for="passward_visibility" class="form-check-label"><b>顯示密碼</b></label>
									</div>
									<button type="submit" class="btn btn-primary ms-auto">
										登入
									</button>
									<button type="reset" class="btn btn-primary ms-auto">
										重設
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								沒有帳號? <a href="{{ route('register.index') }}" class="text-blue">註冊會員</a>
							</div>
							<div class="mb-1 w-100 d-flex justify-content-center links">
								<a href="{{ route('forgot.index') }}" class="float-end">忘記帳號/密碼</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section("script")
<script>function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }</script>
@endsection