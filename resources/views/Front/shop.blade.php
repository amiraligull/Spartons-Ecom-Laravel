@extends('layouts.Front')
@section('content')
<style>
.product-tab-content button {
    width: 100% !important;
}
</style>
<section class="section-b-space pt-0">
    <div class="heading-banner">
        <div class="custom-container container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4>Our Shop</h4>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb float-end">
                        <li class="breadcrumb-item"> <a href="{{url('/')}}">Home </a></li>
                        <li class=" active"> <a href="#">/ Our Shop</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-b-space pt-0">
    <div class="custom-container container">
        <div class="row">
            <div class="col-3">
                <div class="custom-accordion theme-scrollbar left-box">
                    <div class="left-accordion">
                        <h5>Back </h5><i class="back-button fa-solid fa-xmark"></i>
                    </div>
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="search-box"><input type="search" name="text" placeholder="Search here..."><i
                                class="iconsax" data-icon="search-normal-2"></i></div>

                        <div class="accordion-item">
                            <h2 class="accordion-header tags-header"><button class="accordion-button"><span>Shipping
                                        & Delivery</span><span></span></button></h2>
                            <div class="accordion-collapse collapse show" id="panelsStayOpen-collapseSeven">
                                <div class="accordion-body">
                                    <ul class="widget-card">
                                        <li><i class="iconsax" data-icon="truck-fast"></i>
                                            <div>
                                                <h6>Free Shipping</h6>
                                                <p>Free shipping for all US order</p>
                                            </div>
                                        </li>
                                        <li><i class="iconsax" data-icon="headphones"></i>
                                            <div>
                                                <h6>Support 24/7</h6>
                                                <p>Free shipping for all US order</p>
                                            </div>
                                        </li>
                                        <li><i class="iconsax" data-icon="exchange"></i>
                                            <div>
                                                <h6>30 Days Return</h6>
                                                <p>Free shipping for all US order</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="sticky">
                    <div class="top-filter-menu">
                        <div> <a class="filter-button btn">
                                <h6> <i class="iconsax" data-icon="filter"></i>Filter Menu </h6>
                            </a>
                            <div class="category-dropdown"><label for="cars">Sort By :</label><select
                                    class="form-select" id="cars" name="carlist">
                                    <option value="">Best selling</option>
                                    <option value="">Popularity</option>
                                    <option value="">Featured</option>
                                    <option value="">Alphabetically, Z-A</option>
                                    <option value="">High - Low Price</option>
                                    <option value="">% Off - Hight To Low</option>
                                </select></div>
                        </div>

                    </div>
                    <div class="product-tab-content ratio1_3">
                        <div class="row-cols-lg-4 row-cols-md-3 row-cols-2 grid-section view-option row g-3 g-xl-4">
                            @foreach($products as $product)
                                                  
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
                                                                <button type="submit" class="btn btn-primary btn-dark ">Add To Cart</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                     

                            @endforeach
                        </div>
                    </div>
                    <div class="pagination-wrap">
                        <ul class="pagination">
                            <li> <a class="prev" href="#"><i class="iconsax" data-icon="chevron-left"></i></a></li>
                            <li> <a href="#">1</a></li>
                            <li> <a class="active" href="#">2</a></li>
                            <li> <a href="#">3 </a></li>
                            <li> <a class="next" href="#"> <i class="iconsax" data-icon="chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection