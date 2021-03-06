@extends('layouts.app')

@section('content')
<div class="col-lg-3">

    <h1 class="my-4">BYARENT</h1>
    <div class="list-group">
      <a href="/" class="list-group-item">Home</a>
      <a href="/product" class="list-group-item">For Rent</a>
      <a href="/product" class="list-group-item">For Sale</a>
    </div>

  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="http://lorempixel.com/640/360" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/640/360" alt="Second slide">
          </div>
         </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <p class="card-text"><h1><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</strong></h1></p>
   <div class="row">

    @foreach ($products as $product)



      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="/product/{{ $product->slug }}"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
            <a href="/product/{{ $product->slug }}">{{ $product->name }}</a>
            </h4>
            <h5>{{ $product->price }}</h5>
            <p class="card-text">{{ $product->description }}</p>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    <!-- /.row -->

  </div>
@endsection
