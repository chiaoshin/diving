@extends("layouts/app")


@section("head")
<link href="{{ asset("css/mypost.css") }}" rel="stylesheet">

@endsection

@section("body")
<div class="container">
    <div class="div py-3">
        <div class="row">
            <div class="col col-3">
                {{-- @include("") --}}
                {{-- <iframe src="{{ route('forum.index') }}" name="iframe_a" height="500px" width="100%" title="Iframe Example" style="overflow-y: hidden;"></iframe> --}}
            </div>
            <div class="col col-9">
                <div class="notification-container">
                    <!--第一段-->
                    @if(!isset($data->id)){
                        @foreach($mypost as $data)
                            <div class="notification-list">
                            {{-- <div class="notification-list_content" style="overflow-x: scroll;"> --}}
                                <div class="notification-list_content">
                                    <div class="notification-list_img">
                                        <img src="{{ asset('img/forum/users/user2.png') }}" alt="user">
                                    </div>
                                    <div class="notification-list_detail">
                                        <p><b><h2>{{ $data->title }}</h2></b></p>
                                        <div class="box">
                                            <p class="ellipsis">{{ $data->content }}</p>
                                        </div>
                                    
                                    <div class="notification-list_buttons">
                                        <ul class="wrapper">
                                            <a href="{{ route('post.edit',$data->id) }}">
                                            <li class="icon edit">
                                              <span class="tooltip">編輯</span>
                                              <span><img src="{{ asset('img/forum/button/edit.png') }}" ></span>
                                            </li>
                                            </a>
                                            <a>
                                            <li class="icon delete" data-id="{{ $data->id }}">
                                              <span class="tooltip">刪除</span>
                                              <span><img src="{{ asset('img/forum/button/delete.png') }}" ></span>
                                            </li>
                                            </a>
                                            <a href="{{ route('post.show', $data->id) }}">
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
                                </div>
                                <div class="notification-list_feature-img">
                                    <img src="{{ asset($data->image_url) }}" alt="Feature image">
                                </div>
                            </div>
                    </div>	
                    @endforeach
                    }   
                    @else
                        <div class="notification-list">
                            {{-- <div class="notification-list_content" style="overflow-x: scroll;"> --}}
                                <div class="notification-list_content">
                                    <div class="notification-list_img">
                                        <img src="{{ asset('img/forum/users/user2.png') }}" alt="user">
                                    </div>
                                    <div class="notification-list_detail">
                                        <p><b><h2>沒有文章內容</h2></b></p>
                                        <div class="box">
                                            <p class="ellipsis">沒有文章內容</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>	
                    @endif
            </div>
        </div>
    </div>			
</div>
@endsection

@section("script")
<script>
    $(".delete").click(function(){
        $.ajax({
            url: "{{ route('post.destroy', ':id') }}".replace(':id', $(this).data('id')),
            method: "DELETE",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(res) {
                window.location.reload();
            }
        })
    })
</script>
@endsection