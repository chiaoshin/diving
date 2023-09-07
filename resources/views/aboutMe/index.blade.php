@extends("layouts/app")


@section("head")
<link href="{{ asset("css/forumNav.css") }}" rel="stylesheet">
<link href="{{ asset("css/aboutMe.css") }}" rel="stylesheet">
@endsection

@section("body")
<div class="container">
    <div class="row">
        <div class="col col-3">
            @include("forumNav.show")
        </div>
        <div class="col col-9">
            <div class="col-12">
                <div class="card">
                    <div class="up-container">
                        <img src="{{ asset('img/aboutMe/man.png') }}" class="man-img">
                      <input type="file" id="customFile" name="file" hidden="">
                      <label class="btn btn-change" for="customFile"> <img src="{{ asset('img/aboutMe/change.png') }}" class="change-img"><b> 更換照片</b></label>
                    </div>
                    <div class="down-container">
                        <div class="row">
                            <label class="username"><b><br> 使用者名稱：</b></label>
                            <input type="text" class="form1" value="{{ auth()->user()->name }}" placeholder="請輸入名稱">
                            
                            <label class="gender"><b> 生理性別：</b></label>
                            <div class="radio-container">
                                <label class="radio-button">
                                  <input id="radio1" name="radio-group" type="radio">
                                  <span class="radio-checkmark"></span>
                                  <span class="radio-label">男生</span>
                                </label>
                              
                                <label class="radio-button">
                                  <input id="radio2" name="radio-group" type="radio">
                                  <span class="radio-checkmark"></span>
                                  <span class="radio-label">女生</span>
                                </label>
                            </div>
                
                            <label class="email"><b>  電子信箱：</b></label>
                            <input value="{{ auth()->user()->email }}" class="form3" readonly>
                
                                {{-- <label class="phone"><b>  電話：</b></label>
                                <input value="0987-654321" class="form4" readonly> --}}
                
                            <div class="twobutton">
                                <button class="btn btn-save"><b> 儲存 </b><img src="{{ asset('img/aboutMe/save.png') }}" class="save-img"></button>
                                <button class="btn btn-cancel"><b> 取消 </b><img src="{{ asset('img/aboutMe/cancel.png') }}" class="cancel-img"></button>
                            </div>
                          </div>
                        </div>
                  </div>

                {{-- <form class="file-upload">
                    <div class="col-md-3 m-auto">
                       <div class="text-center">
                        <h4 class="mb-2 mt-3">我的相片</h4>
                        <a><img src="{{ asset('img/aboutMe/man.png') }}" class="man-img"></a>
                        <input type="file" id="customFile" name="file" hidden="">
                        <label class="btn btn-change mb-4" for="customFile">更換照片</label>
                       </div>
                     </div>
                            <div class="bg-primary col-12">
                                <div class="row g-3">
                                    <!-- Name -->
                                    <div class='col-6 m-auto'>
                                        <div class='row'>
                                            <div class="col-12">
                                                <label class="username"> 使用者名稱：</label>
                                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" placeholder="請輸入名稱">
                                            </div>
                                        </div>
                                        <!-- Phone number -->
                                        <div class='row'>
                                            <div class="col-12">
                                                <label class="gender">性別：</label>
                                                <input type="text" class="form-control" value="" placeholder="請輸入性別">
                                            </div>
                                        </div>

                                        <div class='row'>
                                            <div class="form-group row col-12">
                                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                                <div class="col-lg-9">
                                                    <input type="button" class="btn btn-save" value="儲存">
                                                    <input type="button" class="btn btn-cancel" value="取消">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </form>  --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script>

</script>
@endsection