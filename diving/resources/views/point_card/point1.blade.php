@extends("layouts/app")

@php

$fake_data = [
[
"id" => 1,
"title" => "潛水 1",
"image_url" => asset("img/map1.jpg"),
"address" => "831高雄市大寮區民泰街92號"
],
[
"id" => 2,
"title" => "潛水 2",
"image_url" => asset("img/map1.jpg"),
"address" => "831高雄市大寮區民泰街92號"
],
[
"id" => 3,
"title" => "潛水 3",
"image_url" => asset("img/map1.jpg"),
"address" => "831高雄市大寮區民泰街92號"
]
];

@endphp

@section('body')
<div class="content">
  <div class="container">
    <h2 class="my-5 text-center">Carousel #8</h2>

    <div class="d-flex carousel-nav">
      <a href="#" class="col active">景點資訊</a>
      <a href="#" class="col">ChatGPT</a>
      <a href="#" class="col">景點評論</a>
    </div>


    <div class="owl-carousel owl-1">

      <div class="media-29101 d-md-flex w-100">
        <div class="img">
          <img src="{{ asset('img//tab_images/hero_1.jpg') }}" alt=" Image" class="img-fluid">
        </div>
        <div class="text">
          <a class="category d-block mb-4" href="#">Travel &mdash; First Tab</a>
          <h2><a href="#">Take your mobile photography to the next level</a></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae fuga optio dolorem, fugit voluptates sint ducimus praesentium iste!</p>
        </div>
      </div> <!-- .item -->

      <div class="media-29101 d-md-flex w-100">
        <div class="img">
          <img src="{{ asset('img//tab_images/hero_2.jpg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="text">
          <a class="category d-block mb-4" href="#">Travel &mdash; Second Tab</a>
          <h2><a href="#">Take your mobile photography to the next level</a></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae fuga optio dolorem, fugit voluptates sint ducimus praesentium iste!</p>
        </div>
      </div> <!-- .item -->

      <div class="media-29101 d-md-flex w-100">
        <div class="img">
          <img src="{{ asset('img//tab_images/hero_3.jpg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="text">
          <a class="category d-block mb-4" href="#">Travel &mdash; Third Tab</a>
          <h2><a href="#">Take your mobile photography to the next level</a></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae fuga optio dolorem, fugit voluptates sint ducimus praesentium iste!</p>
        </div>
      </div> <!-- .item -->



    </div>
  </div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

@endsection