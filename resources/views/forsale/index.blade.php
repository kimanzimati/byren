<!----for sale page--->
@extends('layouts.app')

@section('content')
<div class="col-lg-3">

    <h1 class="my-4">BuySell</h1>
    <div class="list-group">
        <a href="/" class="list-group-item">Home</a>
        <a href="/product" class="list-group-item">For Rent</a>
        <a href="/product" class="list-group-item">For Sale</a>
    </div>

  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

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
