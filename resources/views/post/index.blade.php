@extends("layouts/app")


@section("head")
<link href="{{ asset("css/mypost.css") }}" rel="stylesheet">

@endsection

@section("body")
<div class="container">
    <div class="div py-3">
        <div class="row">
            <div class="col col-3">
                {{-- <iframe src="{{ route('forum.index') }}" name="iframe_a" height="500px" width="100%" title="Iframe Example" style="overflow: hidden;"></iframe> --}}
            </div>
            <div class="col col-9">
                <div class='row'>
                    <div class='col-12'>
                        <div class="tabs">
                            <div class="section-50">  
                                <div class="panels">
                                    {{-- @foreach ([$posts] as $data) --}}
                                        <div class="panel">
                                            @foreach ($data as $post)
                                                <a href="{{ route('post.show', $mypost->id) }}" class="no-underline">
                                                <div class="notification-list">
                                                    <div class="notification-list_content">
                                                        <div class="notification-list_img">
                                                            <img src="{{ asset('img/forum/users/user1.png') }}" alt="user">	
                                                        </div>
                                                        <div class="notification-list_detail">
                                                            <p><b><h2>{{ $post->title }}</h2></b></p>
                                                            <div class="box">
                                                            <p class="ellipsis">
                                                                {!! $post->content !!}
                                                            </p>
                                                            </div>
                                                        </div>				
                                                        <div class="notification-list_feature-img">
                                                            <img src="{{ $post->image_url }}" alt="Feature image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    {{-- @endforeach --}}
                                </div>	
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<div class="notification-list_buttons">
    <ul class="wrapper">
        <a>
        <li class="icon edit">
          <span class="tooltip">編輯</span>
          <span><img src="{{ asset('img/forum/button/edit.png') }}" ></span>
        </li>
        </a>
        <a>
        <li class="icon delete">
          <span class="tooltip">刪除</span>
          <span><img src="{{ asset('img/forum/button/delete.png') }}" ></span>
        </li>
        </a>
        <a>
            <li class="icon post">
              <span class="tooltip">貼文</span>
              <span><img src="{{ asset('img/forum/button/email.png') }}" ></span>
            </li>
            </a>
        <a>
        <li class="icon share">
          <span class="tooltip">分享</span>
          <span><img src="{{ asset('img/forum/button/share.png') }}" ></span>
        </li>
        </a>
    </ul>
</div>
@endsection

@section("script")
<style>
	#content {
		min-height: 100vh;
	}
</style>
<script>
	$("body").removeClass("d-flex")
</script>
@endsection