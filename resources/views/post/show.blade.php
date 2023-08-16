@extends("layouts/app")


@section("head")
<link href="{{ asset("css/post.css") }}" rel="stylesheet">

{{-- 愛心&點點的插件 --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section("body")
<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="post-block">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex mb-3">
                            <div class="mr-2">
                                <a><img src="{{ asset('img/post/users/user2.png') }}" class="author-img"></a>
                            </div>
                            <div>
                                <h5 class="mb-0"><a>{{ $post->user->name }}</a></h5>
                                <p class="mb-0 text-muted">{{ $post->created_at }}</p>
                            </div>
                        </div>
                        
                        <!--3 DOT-->
                        <div class="dropdown">
                            <a class="btn btn-link text-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> 
                             <i class="fa fa-ellipsis-v"></i>
                            </a>
                             
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="#"><img src="{{ asset('img/post/share.png') }}">分享</a></li>
                              <li><a class="dropdown-item" href="#"><img src="{{ asset('img/post/warning.png') }}">檢舉</a></li>
                            </ul>
                             </div>
                        

                    </div>
                    <div class="post-block__content mb-2">
                        <img src="{{ asset($post->image_url) }}" alt="Content img">
                        <h4 class="mt-3">{{ $post->title }}</h4>
                        <p>{!! str_replace("\n", "</br>",$post->content) !!}</p>
                    </div>
                    &nbsp
                    <div class="div d-flex flex-row">
                        {{-- 愛心按鈕 --}}
                        <div class="d-flex">
                            <input type="checkbox" id="heart-checkbox" class="hidden-checkbox">
                            <label for="heart-checkbox" class="heart-label">
                                <i class="fa fa-heart"></i>&nbsp&nbsp<b>{{ $post->like }}</b>
                            </label>
                        </div>

                        {{-- Message數量 --}}
                        <div class="d-flex">
                            &nbsp&nbsp<b>{{ $post->reviews }}</b>
                        </div>
                    </div>

                    <hr>
                    <div class="post-block__comments">
                        <!-- Comment Input -->
                        
                        <!-- Comment content -->
                        <div class="comment-view-box mb-3">
                            <div class="d-flex mb-2">
                                <img src="{{ asset('img/post/users/user1.png') }}" class="author-img author-img--small mr-2">
                                <div>
                                    <h6><a>c109193111</a>　<small class="text-muted">1m</small></h6>
                                    在哪裡看起來好好玩<p>
                                        
                                    <div class="d-flex flex-row">
                                        <!-- 愛心按鈕
                                        <a href="#!" class="text-dark mr-2"><span><i class="fa fa-heart-o"></i></span></a> -->
                                        
                                        <div class="d-flex">                
                                            <input type="checkbox" id="heart-checkbox-top" class="hidden-checkbox">
                                            <label for="heart-checkbox-top" class="heart-label">
                                                <i class="fa fa-heart"></i>&nbsp&nbsp<b>9</b>
                                            </label>                                            
                                        </div>
                                        &nbsp
                                         <!-- 在每个评论内容的末尾添加 Reply 按鈕 -->
                                         <button class="btn btn-link reply-link">
                                            <img src="{{ asset('img/post/feeling/chat.png') }}" alt="Reply">
                                        </button>
                                                
                                         <!-- 隐藏的输入框，用于回复评论 -->
                                         <div class="comment-reply">
                                            <div class="reply-input-container">
                                                <input type="text" class="form-control" placeholder="Add your reply">
                                                <button class="btn btn-primary reply-button"><i class="fa fa-paper-plane"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        
                        <!-- More Comments -->
                        <hr>
                        <div class="comment-view-box mb-3">
                            <div class="d-flex mb-2">
                                <img src="{{ asset('img/post/users/user1.png') }}" class="author-img author-img--small mr-2">
                                <div>
                                    <h6><a>c109193110</a>　<small class="text-muted">1m</small></h6>
                                    那邊很好玩<p>
                                    
                                    <div class="d-flex flex-row">
                                        <!-- 愛心按鈕 
                                        <a href="#!" class="text-dark mr-2"><span><i class="fa fa-heart-o"></i></span></a>-->	
                                        
                                        <!-- 愛心按鈕 -->
                                        <div class="d-flex">
                                            <input type="checkbox" id="heart-checkbox-bottom" class="hidden-checkbox">
                                            <label for="heart-checkbox-bottom" class="heart-label">
                                                <i class="fa fa-heart"></i>&nbsp&nbsp<b>5</b>
                                            </label>
                                        </div>
                                        
                                        &nbsp
                                        <!-- 在每个评论内容的末尾添加 Reply 按鈕 -->
                                        <button class="btn btn-link reply-link">
                                            <img src="{{ asset('img/post/feeling/chat.png') }}" alt="Reply">
                                        </button>
                                                                                
                                        <!-- 隐藏的输入框，用于回复评论 -->
                                        <div class="comment-reply">
                                            <div class="reply-input-container">
                                                <input type="text" class="form-control" placeholder="Add your reply">
                                                <button class="btn btn-primary reply-button"><i class="fa fa-paper-plane"></i></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <hr>
                        
                            <!-- 固定的回复框，放在评论区表格的最底部 -->
                            <div class="input-box">
                                <input type="text" class="form-control" id="bottom-reply-input" placeholder="Add your reply">
                                <button class="btn btn-primary reply-button"><i class="fa fa-paper-plane"></i></button>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section("script")
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
    $(".reply-link").click(function(event) {
        event.preventDefault(); // 阻止默认链接行为

        // 找到被点击的 Reply 链接所在的评论块
        var commentBlock = $(this).closest(".comment-view-box");

        // 在该评论块内找到回复输入框并切换显示/隐藏状态
        var replyInput = commentBlock.find(".comment-reply");
        replyInput.toggle(); // 使用 toggle() 方法来切换显示/隐藏状态
    });

    // 处理回复按钮的点击事件
    $(".reply-button").click(function() {
        // 获取回复内容
        var replyContent = $(this).siblings("input").val();

        // 在此处可以添加将回复内容提交到服务器的逻辑

        // 清空输入框并隐藏
        $(this).siblings("input").val("");
        $(this).closest(".comment-reply").hide();
        });
    });
</script>
@endsection