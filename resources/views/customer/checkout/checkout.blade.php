@extends('customer.layout.master-page-support')
@section('title', 'Checkout')
@section('page-content')
    <style>
        .btn-fill-out2 {
            background-color: transparent;
            border: 1px solid #FF324D;
            color: #FF324D;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-fill-out2::before,
        .btn-fill-out2::after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            background-color: #fffff8;
            color: #FF324D;
            z-index: -1;
            transition: all 0.3s ease-in-out;
            width: 51%;
        }

        .btn-fill-out2::after {
            right: 0;
            left: auto;
        }

        .btn-fill-out2:hover:before,
        .btn-fill-out2:hover:after {
            width: 0;
        }

        .btn-fill-out2:hover {
            background-color: #FF324D;
            color: #fffff8 !important;
        }
    </style>
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Checkout</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{ route('viewHome') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('viewCart') }}">Cart</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- START checkout -->
    <div class="section">
        <div class="container">
            <form id="checkoutForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading_s3">
                            <h5>Select Address</h5>
                        </div>
                        <div class="addresses">
                            <ul class="listview image-listview flush">
                                @if ($addresses)
                                    @foreach ($addresses as $address)
                                        <li>
                                            <a href="javaScript:void(0)" class="item">
                                                <div class="icon-box">
                                                    <div class="payment_method">
                                                        <div class="payment_option">
                                                            <div class="custome-radio">
                                                                <input class="form-check-input" type="radio"
                                                                    name="address_option" id="address{{ $address->id }}"
                                                                    checked value="{{ $address->id }}">
                                                                <label class="form-check-label"
                                                                    for="address{{ $address->id }}"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="in">
                                                    <div>
                                                        <div class="title">{{ $address->address_name }}</div>
                                                        <div class="title text-small">{{ $address->full_name }}</div>
                                                        <div class="title text-small">{{ $address->contact }}</div>
                                                        <div class="text-small mb-05">{{ $address->street_address }}<br />
                                                            {{ $address->town_city }},{{ $address->state }} -
                                                            {{ $address->postal_code }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <a href="{{ route('addAddress') }}" class="btn btn btn-fill-out2 btn-block"> <i
                                class="linearicons-plus"></i> Add New Address</a>
                        <div class="error" id="address_optionError"></div>
                        <div class="heading_s1" style="margin-top: 20px;">
                            <h5>Additional information</h5>
                        </div>
                        <div class="form-group mb-0">
                            <textarea rows="5" name="additional_info" id="additional_info" class="form-control" placeholder="Order notes"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="heading_s1">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table">
                                <div class="spinner-red" id="checkout-loader"></div>
                            </div>
                            <div class="payment_method">
                                <div class="heading_s1">
                                    <h4>Payment</h4>
                                </div>
                                <div class="payment_option">
                                    {{-- <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="paymentFromWallet" value="wallet" checked="">
                                        <label class="form-check-label" for="paymentFromWallet">Direct From Wallet | <a href="{{ route('viewCustomerDashboard') }}" target="_blank" class="theme-color">Add Money</a></label>
                                        <p data-method="wallet" class="payment-text" style="display: block;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                                    </div> --}}
                                    @if ($cashOnDelivery == 'Yes')
                                        <div class="custome-radio">
                                            <input class="form-check-input" type="radio" name="payment_option"
                                                id="cod" value="cod">
                                            <label class="form-check-label" for="cod">Cash on delivery</label>
                                            <p data-method="cod" class="payment-text">Please send your cheque to Store Name,
                                                Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    @endif
                                </div>
                                @if ($deliveryChargeAdvance == 'Yes')

                                <div class="heading_s1">
                                    <h4>Delivery Charge Payment</h4>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span>Dont Know How!</span>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-fill-out mx-2" data-toggle="modal" data-target="#exampleModal">
                                        See How
                                    </button>
                                </div>

                                <div class="payment_option mt-3">
                                    <div class="custome-radio">
                                        <label class="form-label" for="cod">BKash Transaction ID</label>
                                        <input class="form-control" type="text" name="advance_transaction" id="advance_transaction" >
                                        <p data-method="cod" class="payment-text">Please provide your BKash Transaction
                                            ID here to complete the Delivery Charge Payment.</p>



                                    </div>
                                </div>
                                @endif

                            </div>
                            <button type="submit" id="placeOrderBtn" class="btn btn-fill-out btn-block">Place
                                Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close"></i>
                    </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{asset('assets/images/bkashpayment.jpg')}}" alt="Bkash Payment" srcset="">
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- END SECTION SHOP -->
@endsection
@section('customer-js')
    <script src="{{ asset('assets/js/customer/login/customer-login.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/customer/cart/create-update-cart.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/customer/checkout/checkout.js') }}" type="text/javascript"></script>
@endsection
