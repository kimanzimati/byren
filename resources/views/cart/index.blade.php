@extends('layouts.app')

@section('content')

<div class="col-12">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"> </th>
                    <th scope="col">Product</th>
                    <th scope="col">Available</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-right">Price</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                    <td>Terete Gardens</td>
                    <td>In stock</td>
                    <td><input class="form-control" type="text" value="1" /></td>
                    <td class="text-right">999999.99</td>
                    <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                </tr>
                <tr>
                    <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                    <td>Encasa</td>
                    <td>In stock</td>
                    <td><input class="form-control" type="text" value="1" /></td>
                    <td class="text-right">74940.00</td>
                    <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Sub-Total</td>
                    <td class="text-right">1999998</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Tax</td>
                    <td class="text-right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td class="text-right"><strong>2320000</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col mb-2">
    <div class="row">
        <div class="col-sm-12  col-md-6">
            <a href="/product"><button class="btn btn-block btn-light">Continue Shopping</button></a>
        </div>
        <div class="col-sm-12 col-md-6 text-right">
            <a href="/login"><button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button></a>
        </div>
    </div>
</div>
@endsection
