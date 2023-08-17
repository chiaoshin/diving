@extends("layouts/app")


@section("head")
<link href="{{ asset("css/forumNav.css") }}" rel="stylesheet">
<link href="{{ asset("css/forum.css") }}" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{ asset("css/login.css") }}"> --}}

@endsection

@section("body")
<div class="div py-3">
	<div class="row">
		<div class="col col-3">
			{{-- <iframe src="{{ route('forum.index') }}" name="iframe_a" height="500px" width="100%" title="Iframe Example" style="overflow: hidden;"></iframe> --}}
			@include("forumNav.show")
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