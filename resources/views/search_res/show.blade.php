@extends("layouts/app")


@section("head")
<link href="{{ asset("css/search_res.css") }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section("body")
<h2 class="tc"></h2>
    <div class="row row-cols-1 row-cols-md-2 g-1">
        @foreach($result as $data)
            <div class="col-md-5 offset-md-1">
            <div class="card mb-0" style="max-width: 500px;">
                <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset("img/search_res/Free Pilot.jpg") }}" class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title"><b>{{ $data['name'] }}</b></h5>
                    <p class="card-text">{{ $data['address'] }}</p>
                    <a href="{{ $data['url'] }}" class="btn btn-primary">看更多</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @endforeach
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