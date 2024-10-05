@extends('layouts.Front')
@section('content')
<section class="section-b-space pt-0">
    <div class="custom-container container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Your Cart</h3>

                @if($cartItems->isEmpty())
                    <p>Your cart is empty.</p>
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td>{{ $item->product->title }}</td>
                                    <td>
                                        <!-- Update quantity form -->
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="input-group">
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="10" class="form-control" style="width: 70px;">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>${{ number_format($item->product->price, 2) }}</td>
                                    <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                                    <td>
                                        <!-- Remove item form -->
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between">
                        <!-- Move to checkout button -->
                        <a href="{{ route('checkout') }}" class="btn btn-success">Proceed to Checkout</a>
                        <!-- Continue shopping button -->
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
