@extends('layouts.Front')
@section('content')
<style>
    <style>
    .add-to-cart-form {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
    }

    .btn-quantity {
        padding: 5px 10px;
        background-color: #f8f9fa;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-quantity:hover {
        background-color: #e9ecef;
    }

    .quantity-input {
        width: 50px;
        text-align: center;
        border: none;
        outline: none;
    }
</style>

</style>
<section class="section-b-space pt-0">
    <div class="heading-banner">
        <div class="custom-container container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4>Product</h4>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb float-end">
                        <li class="breadcrumb-item"> <a href="{{url('/')}}">Home </a></li>
                        <li class=" active"> <a href="#">/ {{ $product->title }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-b-space pt-0 product-thumbnail-page">
    <div class="custom-container container">
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="row sticky">
                    
                    <div class="col-sm-10 col-9">
                        <div class="swiper product-slider-thumb product-slider-img-1">
                            <div class="swiper-wrapper ratio_square-2">
                                <div class="swiper-slide"> <img class="bg-img"
                                        src="{{ url('public/images/' . $product->image) }}" alt=""></div>
                           
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-detail-box">
                    <div class="product-option">
                        <div class="move-fast-box d-flex align-items-center gap-1"><img
                                src="{{asset('assets/front/images/gif/fire.gif')}}" alt="">
                            <p>Move fast!</p>
                        </div>
                        <h3>{{$product->title}}</h3>
                        <p>price: ${{$product->price}}.00</p>
                        <div class="rating">

                            <p>{{$product->description}} </p>
                        </div>
                        <div class="buy-box border-buttom">
                            <ul>
                                <li> <span data-bs-toggle="modal" data-bs-target="#size-chart" title="Quick View"
                                        tabindex="0"><i class="iconsax me-2" data-icon="ruler"></i>Size Chart</span>
                                </li>
                                <li> <span data-bs-toggle="modal" data-bs-target="#terms-conditions-modal"
                                        title="Quick View" tabindex="0"><i class="iconsax me-2"
                                            data-icon="truck"></i>Delivery & return</span></li>
                                <li> <span data-bs-toggle="modal" data-bs-target="#question-box" title="Quick View"
                                        tabindex="0"><i class="iconsax me-2" data-icon="question-message"></i>Ask a
                                        Question</span></li>
                            </ul>
                        </div>


                        <div class="quantity-box d-flex align-items-center gap-3">
                            <form action="{{ route('add.to.cart') }}" method="POST" class="add-to-cart-form d-flex align-items-center gap-3">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                
                                <div class="quantity-control">
                                    <button type="button" class="btn-quantity minus" onclick="decreaseQuantity()">-</button>
                                    <input type="number" class="form-control quantity-input" name="quantity" value="1" min="1" max="10" id="quantity">
                                    <button type="button" class="btn-quantity plus" onclick="increaseQuantity()">+</button>
                                </div>
                                <button type="submit" class="btn btn-primary btn-dark">Add To Cart</button>
                            </form>
                        </div>
                       
                        <div class="share-option">
                            <h5>Secure Checkout </h5><img class="img-fluid"
                                src="{{asset('assets/front/images/other-img/secure_payments.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>

<section class="section-b-space pt-0 mt-5">
    <div class="custom-container container roduct-c ontain">
        <div class="col-12">
            <div class="title-1">
                <!-- <p>Best Seller<span></span></p> -->
                <h3>Related Products</h3>
            </div>
        </div>
        <div class="swiper special-offer-slide-2">
            <div class="swiper-wrapper ratio1_3">
                @foreach($products as $product)
                     
    <div class="swiper-slide">
        <div class="product-box-3">   
            <div class="img-wrapper">
                <div class="label-block">
                    <span class="lable-1">NEW</span>
                    <a class="label-2 wishlist-icon" href="javascript:void(0)" tabindex="0">
                        <i class="iconsax" data-icon="heart" aria-hidden="true" data-bs-toggle="tooltip" data-bs-title="Add to Wishlist"></i>
                    </a>
                </div>
                <div class="product-image">
                    <a class="pro-first" href="{{ route('productDetails', $product->id) }}">
                        <img class="bg-img" src="{{ url('public/images/' . $product->image) }}" alt="{{ $product->name }}">
                    </a>
                    <a class="pro-sec" href="{{ route('productDetails', $product->id) }}">
                        <img class="bg-img" src="{{ url('public/images/' . $product->image) }}" alt="{{ $product->name }}">
                    </a>
                </div>
                <div class="cart-info-icon">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addtocart" tabindex="0">
                        <i class="iconsax" data-icon="basket-2" aria-hidden="true" data-bs-toggle="tooltip" data-bs-title="Add to cart"></i>
                    </a>
                </div>
            </div>
            <div class="product-detail">
                <a href="{{ route('productDetails', $product->id) }}">
                    <h5>{{ $product->title }}</h5>
                </a>
                
                <p>Price:${{ $product->price }} <del>${{ $product->original_price }}</del></p>
                <form action="{{ route('add.to.cart') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="quantity" value="1">
    <button type="submit" class="btn btn-primary btn-dark">Add To Cart</button>
</form>

            </div>
        </div>
    </div>
@endforeach

            
            </div>
        </div>
    </div>
</section>

<script>
    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        var quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantityInput.value = quantity - 1;
        }
    }

    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        var quantity = parseInt(quantityInput.value);
        if (quantity < 10) {
            quantityInput.value = quantity + 1;
        }
    }
</script>

@endsection