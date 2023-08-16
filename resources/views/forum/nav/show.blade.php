@section("head")
<link href="{{ asset("css/forum.css") }}" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{ asset("css/login.css") }}"> --}}

@endsection

@section("body")
<div class="container">
    <div class="content">
      <input type="radio" name="slider" checked id="home">
      <input type="radio" name="slider" id="person">
      <input type="radio" name="slider" id="post">
      <div class="list">
        <a><img src="left/man.png" class="man-img"></a>
        <div class="topic">王大明</div>
        
        <label for="home" class="home">
          <a><img src="left/chat.png" class="chat-img"></a>
          <span class="title">論壇</span>
        </label>
        <label for="person" class="person">
          <a><img src="left/person.png" class="person-img"></a>
          <span class="title">關於我</span>
        </label>
        <label for="post" class="post">
          <a><img src="left/post.png" class="post-img"></a>
          <span class="title">我的文章</span>
        </label>
        <div class="slider"></div>
      </div>
    </div>
  </div>
@endsection

@section("script")
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>

@endsection