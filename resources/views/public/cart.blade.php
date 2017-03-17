@extends('layouts.app')

@section('pageTitle', 'Cart')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if( $cart_items->count() > 0 )
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $cart_items as $item )
                    <tr>
                        <td>
                            <a href="#">
                                {{ $item->name }}
                            </a>
                        </td>
                        <td>{{ $item->qty }}</td>
                        <td>$ {{ $item->price }}</td>
                        <td>$ {{ $item->subtotal() }}</td>
                    </tr>
                    @endforeach

                    <tfoot>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Subtotal</td>
                            <td>$ {{ $subtotal }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Tax</td>
                            <td>$ {{ $tax }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Total</td>
                            <td>$ {{ $total }}</td>
                        </tr>
                    </tfoot>
                </tbody>
            </table>

            <p>
                <a href="/checkout" class="btn btn-success">Checkout</a>
            </p>

            @else
                <p class="lead">Your cart is empty. <a href="/items">Browse items</a></p>
            @endif
        </div>
    </div>
</div>
@endsection
