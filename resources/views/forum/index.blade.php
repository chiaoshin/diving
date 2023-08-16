@extends("layouts/app")


@section("head")
<link href="{{ asset("css/forum.css") }}" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{ asset("css/login.css") }}"> --}}

@endsection

@section("body")
<div class="div py-3">
	<div class="row">
		<div class="col col-3">
			{{-- <iframe src="{{ route('forum.index') }}" name="iframe_a" height="500px" width="100%" title="Iframe Example" style="overflow: hidden;"></iframe> --}}
			<div class="center-container">
				<div class="row">
					<div class="list row">
						<div class="col">
							<img src="{{ asset('img/forum/left/man.png') }}" class="man-img">
							<div class="topic">
								@if(auth()->check())
									<p>{{  auth()->user()->name}}</p>
								@endif
							</div>
						</div>
						<label for="home" class="home">
							<a href="{{ route('forum.index') }}" class="no-underline text-white">
								<img src="{{ asset('img/forum/left/chat.png') }}" class="chat-img">
								<span class="title"><b>論壇</b></span>
							</a>
						</label>
						<label for="post" class="post">
							<a href="{{ route('post.create') }}" class="no-underline text-white">
								<img src="{{ asset('img/forum/left/post.png') }}" class="post-img">
								  <span class="title"><b>發文</b></span>
							</a>
						</label>
						<label for="person" class="person">
							  <a href="{{ route('forum.index') }}" class="no-underline text-white">
								<img src="{{ asset('img/forum/left/person.png') }}" class="person-img">
								  <span class="title"><b>關於我</b></span>
							</a>
						</label>
						<label for="post" class="post">
							<a href="{{ route('post.index') }}" class="no-underline text-white">
								<img src="{{ asset('img/forum/left/post.png') }}" class="post-img">
								  <span class="title"><b>我的文章</b></span>
							</a>
						</label>
						<label for="logout" class="post">
							<a href="{{ route('logout') }}" class="no-underline text-white">
								{{-- <img src="{{ asset('img/forum/left/post.png') }}" class="post-img"> --}}
								<span class="material-symbols-sharp">logout<span class="title">登出</span></span>  
								{{-- <span class="title"><b>登出</b></span> --}}
							</a>
						</label>
						<div class="slider"></div>
					</div>
					<input type="radio" name="slider" checked id="home">
					<input type="radio" name="slider" id="person">
					<input type="radio" name="slider" id="post">
				</div>
			</div>
		</div>
		<div class="col col-9">
			<div class='row'>
				<div class='col-12'>
					<div class="tabs">
						<div class="section-50">
							
							<input checked id="one" name="tabs" type="radio">
							<label for="one">全部</label>
					
							<input id="two" name="tabs" type="radio" value="Two">
							<label for="two">熱門</label>
					
							<input id="three" name="tabs" type="radio">
							<label for="three">主題</label>

							<div class="panels">
								@foreach ([$posts, $hot_posts, $topic_posts] as $data)
									<div class="panel">
										@foreach ($data as $post)
											<a href="{{ route('post.show', $post->id) }}" class="no-underline">
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
														<div class="notification-list_like">
															{{-- 使用 FontAwesome 的爱心图标 --}}
														<span class="like-count"><img src="{{ asset('img/forum/feeling/love.png') }}" alt="user">{{ $post->like }}</span>
														{{-- 圖案跟圖案空白 --}}
														<span class="like-count"><img src="{{ asset('img/forum/feeling/chat.png') }}" alt="user">{{ $post->reviews }}</span>
													</div>
													{{-- <span style=""><p><small>10 mins ago</small></p></span> --}}
													@if($post->tags)
														<div class='tags'>
															@foreach($post->tags as $tag)
															<span class="badge bg-secondary">{{ $tag->name }}</span>
															@endforeach
														</div>
													@endif
													</div>				
													<div class="notification-list_feature-img">
														<img src="{{ $post->image_url }}" alt="Feature image">
													</div>
												</div>
											</div>
										</a>
										@endforeach
									</div>
								@endforeach
							</div>	
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	#content {
		min-height: 100vh;
	}
</style>
@endsection

@section("script")
<script>
	$("body").removeClass("d-flex")
</script>
@endsection