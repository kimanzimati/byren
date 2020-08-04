@extends('layouts.app')

@section('content')

<div class="col-12">

    <h1>Cart</h1>

    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success')}}
    </div>
    @endif

    @if(Cart::count() > 0)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"> </th>
                    <th scope="col">Product</th>
                    <th scope="col">Description</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-right">Price</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Cart::content() as $item)
                <tr>
                    <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                    <td>{{ $item->model->name }}</td>
                    <td>{{ $item->model->description }}</td>
                    <td><input class="form-control" type="text" value="1" /></td>
                    <td class="text-right">{{ $item->model->price }}</td>
                    <td class="text-right">
                        <button class="btn btn-primary">Save for later</button><br>
                        <form action="/cart/{{ $item->rowId }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}}
                        <button class="btn btn-danger">Delete</button></td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Sub-Total</td>
                    <td class="text-right">KSHS{{ Cart::subtotal() }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Tax</td>
                    <td class="text-right">KSHS{{ Cart::tax() }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td class="text-right"><strong>KSHS{{ Cart::total() }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col mb-2">
        <div class="row">
            <div class="col-sm-12  col-md-6">
                <button class="btn btn-block btn-light">Continue Shopping</button>
            </div>
            <div class="col-sm-12 col-md-6 text-right">
                <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
            </div>
        </div>
    </div>
</div>


@else

<h3>No items in Cart!</h3>

@endif

@endsection
