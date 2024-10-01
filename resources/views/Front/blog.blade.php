@extends('layouts.Front')
@section('content')
<section class="section-b-space pt-0">
    <div class="heading-banner">
        <div class="custom-container container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4>Ingrediants</h4>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb float-end">
                        <li class="breadcrumb-item"> <a href="{{url('/')}}">Home </a></li>
                        <li class=" active"> <a href="#">/ Ingrediants</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-b-space pt-0">
    <div class="custom-container container blog-page">
        <div class="row blog-no-sidebar">
            <div class="col-12 ratio50_2">
                <div class="row gy-4 sticky">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-main-box">
                            <div>
                                <div class="blog-img">
                                    <img class="img-fluid bg-img" src="{{asset('assets/front/images/p4.avif')}}" alt="">
                                </div>
                            </div>
                            <div class="blog-content"> <span class="blog-date">May 9, 2018 </span><a
                                    href="{{url('blogDetails')}}">
                                    <h4>How Black Trans Women Are Redefining Beauty Standards</h4>
                                </a>
                                <p>Sed non mauris vitae erat consequat. Proin gravida nibh vel velit auctor aliquet.
                                    Aenean sollicitudin, lom quis bibenm auctor, nisi elit consequat ipsum, nec
                                    sagittis sem nibh id elit. Duis sed odio sit amet nibh vuutate cursus a sit amet
                                    maorbi We were making our way to the Rila Mountains, where we were visiting the
                                    Rila Monastery where we enjoyed scrambled eggs, toast, mekitsi, local jam and
                                    peppermint tea.</p>
                                <div class="share-box">
                                    <div class="d-flex align-items-center gap-2">
                                        <img class="img-fluid" src="{{asset('assets/front/images/user/1.jpg')}}" alt="">
                                        <h6>by John wiki on</h6>
                                    </div><a href="{{url('blogDetails')}}"> Read More..</a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="pagination-wrap mt-0">
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