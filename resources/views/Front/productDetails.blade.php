@extends('layouts.Front')
@section('content')
<section class="section-b-space pt-0">
    <div class="heading-banner">
        <div class="custom-container container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4>Product</h4>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb float-end">
                        <li class="breadcrumb-item"> <a href="{{('/')}}">Home </a></li>
                        <li class=" active"> <a href="#">/ Product</a></li>
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
                    <div class="col-sm-2 col-3">
                        <div class="swiper product-slider product-slider-img">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"> <img
                                        src="{{asset('assets/front/images/product/slider/1.png')}}" alt="">
                                </div>
                                <div class="swiper-slide"> <img
                                        src="{{asset('assets/front/images/product/slider/2.png')}}" alt="">
                                </div>
                                <div class="swiper-slide"> <img
                                        src="{{asset('assets/front/images/product/slider/1.png')}}" alt="">
                                </div>

                                <div class="swiper-slide"> <img
                                        src="{{asset('assets/front/images/product/slider/1.png')}}" alt="">
                                </div>
                                <div class="swiper-slide"> <img
                                        src="{{asset('assets/front/images/product/slider/2.png')}}" alt="">
                                </div>
                                <div class="swiper-slide"> <img
                                        src="{{asset('assets/front/images/product/slider/1.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-9">
                        <div class="swiper product-slider-thumb product-slider-img-1">
                            <div class="swiper-wrapper ratio_square-2">
                                <div class="swiper-slide"> <img class="bg-img"
                                        src="{{asset('assets/front/images/product/slider/1.png')}}" alt=""></div>
                                <div class="swiper-slide"> <img class="bg-img"
                                        src="{{asset('assets/front/images/product/slider/2.png')}}" alt=""></div>

                                <div class="swiper-slide"> <img class="bg-img"
                                        src="{{asset('assets/front/images/product/slider/1.png')}}" alt=""></div>
                                <div class="swiper-slide"> <img class="bg-img"
                                        src="{{asset('assets/front/images/product/slider/2.png')}}" alt=""></div>

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
                        <h3>Sguatch Wood Barrel Bourbone</h3>
                        <p>$20.00<del>$35.00</del><span class="offer-btn">25% off</span></p>
                        <div class="rating">

                            <p>Dressing up. People just don't do it anymore. We have to change that. Give me time
                                and I'll give you a revolution. What I hate is nasty, ugly people. The market is
                                like a language, and you have to be able to understand what they're saying. </p>
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
                            <div class="quantity"><button class="minus" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-dash-square-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm2.5 7.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1" />
                                    </svg>
                                </button><input type="number" value="1" min="1" max="20"><button class="plus"
                                    type="button"><i class="fa-solid fa-plus"></i></button></div>
                            <div class="d-flex align-items-center gap-3 w-100">
                                <a class="btn btn_black sm" href="#" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Buy Now</a>
                                <a class="btn btn_outline sm" href="#">Back to Home</a>
                            </div>
                        </div>

                        <div class="sale-box">
                            <div class="d-flex align-items-center gap-2"><img
                                    src="{{asset('assets/front/images/gif/timer.gif')}}" alt="">
                                <p>Limited Time Left! Hurry, Sale Ending!</p>
                            </div>
                            <div class="countdown">
                                <ul class="clockdiv1">
                                    <li>
                                        <div class="timer">
                                            <div class="days"></div>
                                        </div><span class="title">Days</span>
                                    </li>
                                    <li>:</li>
                                    <li>
                                        <div class="timer">
                                            <div class="hours"></div>
                                        </div><span class="title">Hours</span>
                                    </li>
                                    <li>:</li>
                                    <li>
                                        <div class="timer">
                                            <div class="minutes"></div>
                                        </div><span class="title">Min</span>
                                    </li>
                                    <li>:</li>
                                    <li>
                                        <div class="timer">
                                            <div class="seconds"></div>
                                        </div><span class="title">Sec</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="dz-info">
                            <ul>
                                <li>
                                    <div class="d-flex align-items-center gap-2">
                                        <h6>Sku:</h6>
                                        <p> SKU_45 </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center gap-2">
                                        <h6>Available: </h6>
                                        <p>Pre-Order</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center gap-2">
                                        <h6>Tags: </h6>
                                        <p>Color Pink Clay , Athletic, Accessories, Vendor Kalles</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center gap-2">
                                        <h6>Vendor: </h6>
                                        <p> Balenciaga</p>
                                    </div>
                                </li>
                            </ul>
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
    <div class="product-section-box x-small-section pt-0">
        <div class="custom-container container">
            <div class="row">
                <div class="col-12">
                    <ul class="product-tab theme-scrollbar nav nav-tabs nav-underline" id="Product" role="tablist">
                        <li class="nav-item" role="presentation"><button class="nav-link active" id="Description-tab"
                                data-bs-toggle="tab" data-bs-target="#Description-tab-pane" role="tab"
                                aria-controls="Description-tab-pane" aria-selected="true">Description</button></li>
                        <li class="nav-item" role="presentation"><button class="nav-link" id="specification-tab"
                                data-bs-toggle="tab" data-bs-target="#specification-tab-pane" role="tab"
                                aria-controls="specification-tab-pane" aria-selected="false">Specification</button>
                        </li>
                        <li class="nav-item" role="presentation"><button class="nav-link" id="question-tab"
                                data-bs-toggle="tab" data-bs-target="#question-tab-pane" role="tab"
                                aria-controls="question-tab-pane" aria-selected="false">Q & A</button></li>

                    </ul>
                    <div class="tab-content product-content" id="ProductContent">
                        <div class="tab-pane fade show active" id="Description-tab-pane" role="tabpanel"
                            aria-labelledby="Description-tab" tabindex="0">
                            <div class="row gy-4">
                                <div class="col-12">
                                    <p class="paragraphs">Experience the perfect blend of comfort and style with our
                                        Summer Breeze Cotton Dress. Crafted from 100% premium cotton, this dress
                                        offers a soft and breathable feel, making it ideal for warm weather. The
                                        lightweight fabric ensures you stay cool and comfortable throughout the day.
                                    </p>
                                    <p class="paragraphs">Perfect for casual outings, beach trips, or summer
                                        parties. Pair it with sandals for a relaxed look or dress it up with heels
                                        and accessories for a more polished ensemble.</p>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="specification-tab-pane" role="tabpanel"
                            aria-labelledby="specification-tab" tabindex="0">
                            <p>I like to be real. I don't like things to be staged or fussy. Grunge is a hippied
                                romantic version of punk. I have my favourite fashion decade, yes, yes, yes: '60s.
                                It was a sort of little revolution; the clothes were amazing but not too
                                exaggerated. Fashions fade, style is eternal. A girl should be two things: classy
                                and fabulous.</p>

                        </div>
                        <div class="tab-pane fade" id="question-tab-pane" role="tabpanel" aria-labelledby="question-tab"
                            tabindex="0">
                            <div class="question-main-box">
                                <h5>Have Doubts Regarding This Product ?</h5>
                                <h6 data-bs-toggle="modal" data-bs-target="#question-modal" title="Quick View"
                                    tabindex="0">Post Your Question</h6>
                            </div>
                            <div class="question-answer">
                                <ul>
                                    <li>
                                        <div class="question-box">
                                            <p>Q1 </p>
                                            <h6>Which designer created the little black dress?</h6>
                                            <ul class="link-dislike-box">
                                                <li> <a href="#"><i class="iconsax" data-icon="like"> </i>0</a></li>
                                                <li> <a href="#"><i class="iconsax" data-icon="dislike"> </i>0</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="answer-box"><b>Ans.</b><span>The little black dress (LBD) is
                                                often attributed to the iconic fashion designer Coco Chanel. She
                                                popularized the concept of the LBD in the 1920s, offering a simple,
                                                versatile, and elegant garment that became a staple in women's
                                                fashion.</span></div>
                                    </li>
                                    <li>
                                        <div class="question-box">
                                            <p>Q2 </p>
                                            <h6>Which First Lady influenced women's fashion in the 1960s?</h6>
                                            <ul class="link-dislike-box">
                                                <li> <a href="#"><i class="iconsax" data-icon="like"> </i>0</a></li>
                                                <li> <a href="#"><i class="iconsax" data-icon="dislike"> </i>0</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="answer-box"><b>Ans.</b><span>The First Lady who significantly
                                                influenced women's fashion in the 1960s was Jacqueline Kennedy, the
                                                wife of President John F. Kennedy. She was renowned for her elegant
                                                and sophisticated style, often wearing simple yet chic outfits that
                                                set trends during her time in the White House. </span></div>
                                    </li>
                                    <li>
                                        <div class="question-box">
                                            <p>Q3 </p>
                                            <h6>What was the first name of the fashion designer Chanel?</h6>
                                            <ul class="link-dislike-box">
                                                <li> <a href="#"><i class="iconsax" data-icon="like"> </i>0 </a>
                                                </li>
                                                <li> <a href="#"><i class="iconsax" data-icon="dislike"> </i>0</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="answer-box"><b>Ans.</b><span>The first name of the fashion
                                                designer Chanel was Gabrielle. Gabrielle "Coco" Chanel was a
                                                pioneering French fashion designer known for her timeless designs,
                                                including the iconic Chanel suit and the little black dress.</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="question-box">
                                            <p>Q4 </p>
                                            <h6>Carnaby Street, famous in the 60s as a fashion center, is in which
                                                capital?</h6>
                                            <ul class="link-dislike-box">
                                                <li> <a href="#"><i class="iconsax" data-icon="like"> </i>0</a></li>
                                                <li> <a href="#"><i class="iconsax" data-icon="dislike"> </i>0</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="answer-box"><b>Ans.</b><span>Carnaby Street, famous for its
                                                association with fashion and youth culture in the 1960s, is located
                                                in London, the capital of the United Kingdom.🎉</span></div>
                                    </li>
                                    <li>
                                        <div class="question-box">
                                            <p>Q5 </p>
                                            <h6>Threadless is a company selling unique what?</h6>
                                            <ul class="link-dislike-box">
                                                <li> <a href="#"><i class="iconsax" data-icon="like"> </i>0</a></li>
                                                <li> <a href="#"><i class="iconsax" data-icon="dislike"> </i>0</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="answer-box"><b>Ans.</b><span>Threadless is a company selling
                                                unique T-shirts.</span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection