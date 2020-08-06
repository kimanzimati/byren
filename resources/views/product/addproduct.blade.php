@extends('layouts.app')

@section('content')

<h1>Add Houses</h1>
<form method="POST" action="/product">
    <div class="form-group">
      <label for="name">Enter house name</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Enter House Name">
    </div>
    <div class="form-group">
        <label for="price"> Enter Price</label>
        <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price">
      </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="body" id="description" cols="30" rows="10"></textarea>
    </div>
    {{ csrf_field() }}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
