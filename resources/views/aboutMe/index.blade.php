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
                <form class="file-upload">
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
                </form> 
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script>

</script>
@endsection