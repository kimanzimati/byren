@extends('layouts.app')

@section('content')

<h1>Edit Product</h1>
<form method="POST" action="/product/{{$product->id}}">
  {{ method_field('PUT') }}
    <div class="form-group">
      <label for="name">Enter house name</label>
    <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}">
    </div>
    <div class="form-group">
        <label for="price">Enter price name</label>
      <input type="text" name="price" class="form-control" id="price" value="{{$product->price}}">
      </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="body" cols="30" rows="10">{{$product->description}}</textarea>
    </div>
    {{ csrf_field() }}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
