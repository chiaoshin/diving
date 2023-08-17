<div class="body-container">
    <img src="{{ asset('img/forumNav/man.png') }}" class="man-img">
    <div class="topic">
        @if(auth()->check())
            <p>{{  auth()->user()->name}}</p>
        @endif
    </div>
    <div class="d-grid gap-2 col-3">
        <a href="{{ route('post.create') }}" class="no-underline text-white"><button class="btn button" type="button"><img src="{{ asset('img/forumNav/share.png') }}" class="share-img"><b> 發文</b></button></a>
        <a href="{{ route('aboutMe.index') }}" class="no-underline text-white"><button class="btn button" type="button"><img src="{{ asset('img/forumNav/person.png') }}" class="person-img"><b> 關於我</b></button></a>
        <a href="{{ route('forum.index') }}" class="no-underline text-white"><button class="btn button" type="button"><img src="{{ asset('img/forumNav/chat.png') }}" class="chat-img" ><b> 論壇</b> </button></a>
        <a href="{{ route('post.index') }}" class="no-underline text-white"><button class="btn button" type="button"><img src="{{ asset('img/forumNav/post.png') }}" class="post-img"><b> 我的文章</b></button></a>
        <a href="{{ route('logout') }}" class="no-underline text-white"><button class="btn button" type="button"><img src="{{ asset('img/forumNav/logout.png') }}" class="logout-img"><b> 登出</b></button></a>
    </div>
</div>