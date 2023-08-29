<div class="comment-view-box mb-3" style="padding-left: {{ ($comment['level'] - 1 )* 5 }}%;">
    <div class="d-flex mb-2">
        <img src="{{ asset('img/post/users/user1.png') }}" class="author-img author-img--small mr-2">
        <div>
            <h6><a>{{ $comment['creator'] }}</a>　<small class="text-muted">{{ $comment['created_at'] }}</small></h6>
            <p>
                {{ $comment['content']}}
            </p>
                
            <div class="d-flex flex-row">
                <!-- 愛心按鈕
                <a href="#!" class="text-dark mr-2"><span><i class="fa fa-heart-o"></i></span></a> -->
                
                <div class="d-flex heart-checkbox-top" data-id='{{ $comment['id'] }}' data-type='comment'>                
                    {{-- <input type="checkbox" name="" class="hidden-checkbox"> --}}
                    <label for="heart-checkbox-top" class="heart-label">
                        <i class="fa fa-heart {{ $comment['is_like'] ? 'active' : '' }}"></i>&nbsp&nbsp<b>{{ $comment['like_count'] }}</b>
                    </label>                                            
                </div>
                &nbsp
                <!-- 在每个评论内容的末尾添加 Reply 按鈕 -->
                <button class="btn btn-link reply-link" data-id='{{ $comment['id'] }}'>
                    <img src="{{ asset('img/post/feeling/chat.png') }}" alt="Reply">
                </button>

                <button class='deleteComment btn btn-danger' data-cid='{{ $comment['id'] }}'>
                    刪除
                </button>                        
                <!-- 隐藏的输入框，用于回复评论 -->
                {{-- <div class="comment-reply">
                    <div class="reply-input-container">
                        <input type="text" class="form-control" placeholder="Add your reply">
                        <button class="btn btn-primary reply-button"><i class="fa fa-paper-plane"></i></button>
                    </div>
                </div> --}}

            </div>
        </div>
        
    </div>
</div>