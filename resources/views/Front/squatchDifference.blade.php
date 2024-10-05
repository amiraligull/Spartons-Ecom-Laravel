@extends('layouts.Front')
@section('content')


    
    <section class="section-b-space pt-0">
        <div class="heading-banner">
            <div class="custom-container container">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4>The Squatch Difference </h4>
                    </div>
                    <div class="col-sm-6">
                        <ul class="breadcrumb float-end">
                            <li class="breadcrumb-item"> <a href="{{url('/')}}">Home </a></li>
                            <li class=" active"> <a href="#">/ Squatch Difference </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-b-space pt-0">
        <div class="custom-container container">
            <div class="row align-items-center gy-4">

                <div class="col-lg-6 order-1 order-lg-1 ratio_55">
                    <div class="about-img"> <img class="bg-img img-fluid" src="{{asset('assets/front/images/sqatch.webp')}}" alt="">

                    </div>
                </div>
                <div class="col-lg-6 order-2 order-lg-2">
                    <div class="about-content">
                        <div class="sidebar-title">
                            <div class="loader-line"></div>
                            <h3>The Squatch Difference. </h3>
                        </div>
                        <p>We craft natural, high-performance personal care products in manly scents with only the
                            finest ingredients Mother Nature
                            has to offer. The Personal Care Industry Needs Cleaning While some brands choose to cut
                            corners with inferior ingredients to make production cheaper and faster, we take a
                            different approach. Your well-being matters to us. We’re dedicated to providing products
                            that you can trust and feel
                            good about using.</p>

                    </div>
                </div>
                <div class="col-lg-6 order-4 order-lg-3">
                    <div class="about-content about-content-1">
                        <div class="sidebar-title">
                            <div class="loader-line"></div>
                            <h3>Spartons Care Mission</h3>
                        </div>
                        <p>Inspired by a mission to help educate and inspire men to be happier and healthier, our
                            founder created Dr. Squatch. Even
                            though our products are now enjoyed by millions, our mission stays the same. Now, our
                            mission is the foundation of our
                            philanthropic efforts too.
                        </p>
                        <br>
                        <p><strong>Natural Products:</strong>
                            All of our products are 98-100% natural origin and are made with the finest ingredients
                            Mother Nature has to offer.</p>
                        <br>
                        <p><strong>No Harmful Ingredients:</strong>

                            No bad stuff. We have a sh*t list of ingredients commonly found in generic personal care
                            products that we never use.</p>

                    </div>
                </div>
                <div class="col-lg-6 order-3 order-lg-4 ratio_55">
                    <div class="about-img about-img-1"> <img class="bg-img img-fluid" src="{{asset('assets/front/images/sqatch1.webp')}}"
                            alt="">
                        <div class="about-tag"> <a href="#">
                                <h5>Mission</h5>
                            </a></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section-b-space layout-light mt-5">
        <div class="custom-container container">
            <div class="row gy-4">

                <div class="col-md-4">
                    <div class="about-icon"> <i class="iconsax" data-icon="blur"></i>
                        <h5>Natural Products</h5>
                        <p>All of our products are 98-100% natural origin and are made with the finest ingredients
                            Mother Nature has to offer.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-icon"> <i class="iconsax" data-icon="diamonds"></i>
                        <h5>No Harmful Ingredients</h5>
                        <p>No bad stuff. We have a sh*t list of ingredients found in generic personal care products that
                            we never use.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-icon"> <i class="iconsax" data-icon="media-sliders-3"></i>
                        <h5>Formulated For Men</h5>
                        <p>Formulated specifically for men, our products perform at the highest level and feature
                            unique, manly scents.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-b-space pt-0">
        <div class="custom-container container">
            <div class="row align-items-center  mt-5 gy-4">

                <div class="col-lg-6 order-1 order-lg-1 ratio_55">
                    <div class="about-img"> <img class="bg-img img-fluid" src="{{asset('assets/front/images/story.webp')}}" alt="">

                    </div>
                </div>
                <div class="col-lg-6 order-2 order-lg-2">
                    <div class="about-content">
                        <div class="sidebar-title">
                            <div class="loader-line"></div>
                            <h3>The Squatch Story</h3>
                        </div>
                        <p>Inspired by a love of natural products, our founder Jack began creating his own natural soap
                            in his garage. He also knew
                            there must be other guys out there who wanted better products with natural ingredients and
                            manly scents. With that, Dr.
                            Squatch was born! Millions of happy customers later, the Dr. Squatch mission remains the
                            same - to raise the bar for
                            natural products and change the way men approach their personal care.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection