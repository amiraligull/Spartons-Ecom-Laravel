@extends('layouts.Front')

@section('content')
<section class="section-b-space pt-0">
    <div class="custom-container container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Your Checkout</h3>

                <!-- Success or Error Messages -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('coupon_error'))
                    <div class="alert alert-danger">
                        {{ session('coupon_error') }}
                    </div>
                @endif

                @if($cartItems->isEmpty())
                    <p>Your cart is empty.</p>
                @else
                    <!-- Cart Items Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $subTotal = 0;
                            @endphp
                            @foreach($cartItems as $item)
                                <tr>
                                    <td>{{ $item->product->title }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ $item->product->price }}</td>
                                    <td>${{ $item->product->price * $item->quantity }}</td>
                                </tr>
                                @php
                                    $subTotal += $item->product->price * $item->quantity;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Subtotal & Discount Section -->
                    <p><strong>Subtotal: </strong> ${{ $subTotal }}</p>

                    @if (session('discount'))
                        <p><strong>Discount: </strong> -${{ session('discount') }}</p>
                        <p><strong>Total: </strong> ${{ $subTotal - session('discount') }}</p>
                    @else
                        <p><strong>Total: </strong> ${{ $subTotal }}</p>
                    @endif

                    <!-- User Details Form -->
                    <h4>Billing Details</h4>
                    <form action="{{ route('place.order') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" required placeholder="Enter your full name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="Enter your email">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" class="form-control" required placeholder="Enter your phone number">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" required placeholder="Enter your shipping address"></textarea>
                        </div>

                        <!-- Coupon Form -->
                        <h4>Apply Coupon</h4>
                        <form action="{{ route('apply.coupon') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="coupon_code" class="form-control" placeholder="Enter Coupon Code">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Apply Coupon</button>
                                </div>
                            </div>
                        </form>

                        <!-- Checkout Button -->
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </form>

                    <a href="{{ url('/') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
