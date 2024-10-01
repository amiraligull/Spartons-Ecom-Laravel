@extends('layouts.Front')
@section('content')
<section class="section-b-space pt-0">
    <div class="heading-banner">
        <div class="custom-container container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4>Hero Discount</h4>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb float-end">
                        <li class="breadcrumb-item"> <a href="{{url('/')}}">Home </a></li>
                        <li class=" active"> <a href="#">/ Hero Discount</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container  p-0">
    <div class="row">
        <div class="col-md-4  ">
            <div class="coupon-card card  shadow-md p-4 mb-5">
                <div class="coupon-header">
                    <h5>Exclusive Discount for Spartons Care Customers!</h5>
                </div>
                <div class="coupon-body">
                    <p class=" text-small">
                        Save <strong>20% off</strong> your next purchase.
                    </p>
                    <p class="offer-details">
                        Valid until: <strong>December 31, 2024</strong>
                    </p>
                    <p class="coupon-code btn  btn-primary">SPARTONS20</p>

                </div>
            </div>
        </div>

        <div class="col-md-4  ">
            <div class="coupon-card card shadow-md p-4 mb-5">
                <div class="coupon-header">
                    <h5>Exclusive Discount for Spartons Care Customers!</h5>
                </div>
                <div class="coupon-body">
                    <p class=" text-small">
                        Save <strong>20% off</strong> your next purchase.
                    </p>
                    <p class="offer-details">
                        Valid until: <strong>December 31, 2024</strong>
                    </p>
                    <p class="coupon-code btn  btn-primary">SPARTONS20</p>

                </div>
            </div>
        </div>


        <div class="col-md-4  ">
            <div class="coupon-card card shadow-md p-4 mb-5">
                <div class="coupon-header">
                    <h5>Exclusive Discount for Spartons Care Customers!</h5>
                </div>
                <div class="coupon-body">
                    <p class=" text-small">
                        Save <strong>20% off</strong> your next purchase.
                    </p>
                    <p class="offer-details">
                        Valid until: <strong>December 31, 2024</strong>
                    </p>
                    <p class="coupon-code btn  btn-primary">SPARTONS20</p>

                </div>
            </div>
        </div>
    </div>

</section>

@endsection