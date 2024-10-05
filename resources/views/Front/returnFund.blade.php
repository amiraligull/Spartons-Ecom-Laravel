@extends('layouts.Front')
@section('content')
    
    <section class="section-b-space pt-0">
        <div class="heading-banner">
            <div class="custom-container container">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4>Refund Policy</h4>
                    </div>
                    <div class="col-sm-6">
                        <ul class="breadcrumb float-end">
                            <li class="breadcrumb-item"> <a href="{{url('/')}}">Home </a></li>
                            <li class=" active"> <a href="#">/ Refund Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container  mb-4">
            <div class="row">
                <div class="col-md-12 ">
                    <h1 class="text-center mb-4">Refund Policy</h1>
                    <p>
                        At <strong>Spartons Care</strong>, we strive to provide you with the best service possible.
                        However, if
                        you are not completely satisfied with your purchase, we are here to help. Please review our
                        refund
                        policy below.
                    </p>

                    <h3>Eligibility for Refunds</h3>
                    <p>
                        To be eligible for a refund, you must meet the following criteria:
                    </p>
                    <ul>
                        <li>The product must be unused and in the same condition as when you received it.</li>
                        <li>Requests for refunds must be made within 30 days of purchase.</li>
                        <li>Provide proof of purchase (receipt or order number).</li>
                    </ul>

                    <h3>How to Request a Refund</h3>
                    <p>
                        To initiate a refund, please follow these steps:
                    </p>
                    <ol>
                        <li>Contact our customer service team at <a
                                href="mailto:support@spartonscare.com">support@spartonscare.com</a> with your order
                            details.
                        </li>
                        <li>Include a brief explanation of the reason for your refund request.</li>
                        <li>We will review your request and respond within 3-5 business days.</li>
                    </ol>

                    <h3>Refund Process</h3>
                    <p>
                        Once your refund request is approved, we will process the refund to your original payment
                        method.
                        Refunds may take up to 7 business days to reflect in your account.
                    </p>

                    <h3>Non-Refundable Items</h3>
                    <p>
                        Certain items are not eligible for refunds, including:
                    </p>
                    <ul>
                        <li>Gift cards</li>
                        <li>Discounted or sale items</li>
                        <li>Products marked as "final sale"</li>
                    </ul>

                    <h3>Contact Us</h3>
                    <p>
                        If you have any questions about our refund policy, feel free to contact us at <a
                            href="mailto:support@spartonscare.com">support@spartonscare.com</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection