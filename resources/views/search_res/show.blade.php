@extends("layouts/app")


@section("head")
<link href="{{ asset("css/reviews.css") }}" rel="stylesheet">
<link href="{{ asset("css/search_res.css") }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section("body")
<h2 class="tc"></h2>
    <div class="row" style="max-width: 100%;">
        <div class="col-12 col-md-10 m-auto">
          <div class="row">
            @foreach($result as $data)
            <div class="col-12 col-md-6 d-flex p-2">
                <div class="card mb-0 w-100 h-100 {{ $loop->index % 2 == 0 ? 'ms-auto' : 'me-auto' }}">
                    <div class="row g-0">
                    <div class="col-md-5 cover-bg" style="background-image: url('{{ asset($data['preview_img_url']) }}')">
                        {{-- <img src="{{ asset("img/store/hotel2.png") }}" class="img-fluid rounded-start" alt=""> --}}
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                        <h5 class="card-title"><b>{{ $data['name'] }}</b></h5>
                        <p class="card-text">{{ $data['address'] }}</p>
                        <div class="rating-card">
                          <div class="m-b-30">  <!-- ... 調整表格裡面的位置 ... -->
                            <h1 class="rating-number">{{ $data['star_rating'] }}<small>/5</small></h1>
                            <div class="text-muted">({{ number_format($data['reviews']) }} review)</div>
                              <div class="rating-stars d-inline-block position-relative mr-2">
                                <img src="{{ asset('img/reviews/grey-star.svg') }}" alt="">
                                <div class="filled-star" style="width:{{ $data['rate_star_percent'] }}%"></div>  <!-- ... width可以調整星星占比 ... -->
                              </div>
                          </div>
                        </div>
                        <a href="{{ $data['url'] }}" class="btn btn-primary">查看更多</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
          </div>
        </div>
    </div>
    
    <!-- 切換頁 -->
    <h2 class="tc"></h2>
    <div class="d-flex justify-content-center">
      <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="{{ route('search_res.index') }}?{{ $pageInfo['queryParams'] }}&page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
                @for($i = max($pageInfo['currPage'] - 2, 1); $i <= min($pageInfo['currPage'] + 2, $pageInfo['totalPage']); $i++)
                    <li class="page-item"><a class="page-link" href="{{ route('search_res.index') }}?{{ $pageInfo['queryParams'] }}&page={{ $i }}">{{ $i }}</a></li>
                @endfor
              <li class="page-item">
              <a class="page-link" href="{{ route('search_res.index') }}?{{ $pageInfo['queryParams'] }}&page={{ $pageInfo['totalPage'] }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
      </nav>
    </div>
@endsection

@section("script")

@endsection