@extends('site.site-main')

@section('title', 'Cart')

@section('content')

    <!-- Page Header Start -->
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (Session::has('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session('fail') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 180px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                @if (isset($cart_data))
                    @if (Cookie::get('shopping_cart'))
                        @php
                            // dd(isset($cart_data));
                        $total = '0'; @endphp
                        <table class="table table-bordered text-center mb-0">
                            <div class="col-md-12 text-right mb-3">
                                <a href="javascript:void(0)" class="clear_cart font-weight-bold"
                                    style="text-decoration: none; font-size:20px">Clear Cart</a>
                            </div>
                            <thead class="bg-secondary text-dark">
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Color</th>
                                    <th>Product Size</th>
                                    <th>Product Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @foreach ($cart_data as $data)
                                    <tr class="cartpage">
                                        <td class="align-middle"> <a class="entry-thumbnail" href="javascript:void(0)">
                                                <img src="{{ asset('uploads/addProduct/' . $data['item_image']) }}"
                                                    width="60px" height="50px" alt=""></a>
                                        </td>
                                        <td class="align-middle">
                                            <span>{{ $data['item_name'] }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="cart-sub-total-price" id="item_price">{{ number_format($data['item_price'], 2) }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span>{{ $data['item_color'] }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span id="item_size">{{ $data['item_size'] }}</span>
                                        </td>
                                        <td class="cart-product-quantity align-middle" width="140px">
                                            <input type="hidden" class="product_id" value="{{ $data['item_id'] }}">
                                            <div class="input-group quantity">
                                                <div class="input-group-prepend decrement-btn changeQuantity"
                                                    style="cursor: pointer">
                                                    <span class="input-group-text">-</span>
                                                </div>
                                                <input type="text" class="qty-input form-control" maxlength="2"
                                                    max="10" value="{{ $data['item_quantity'] }}">
                                                <div class="input-group-append increment-btn changeQuantity"
                                                    style="cursor: pointer">
                                                    <span class="input-group-text">+</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <span class="cart-grand-total-price"
                                                id="sub_total">{{ number_format($data['item_quantity'] * $data['item_price'], 2) }}</span>
                                        </td>
                                        <td class="align-middle">

                                            <button class="btn btn-sm btn-primary delete_cart_data"><i
                                                    class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                            </tbody>
                        </table>
                    @endif
                @else
                    <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="mycards">
                                <h4>Your cart is currently empty.</h4>
                                <a href="{{ url('collections') }}"
                                    class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div id="totalajaxcall">
                        <div class="totalpricingload">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Subtotal</h6>
                                    <h6 class="font-weight-medium">Rs. @if (Cookie::get('shopping_cart'))
                                            {{ number_format($total, 2) }}
                                        @else
                                            0
                                        @endif
                                    </h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Shipping</h6>
                                    <h6 class="font-weight-medium">Rs. @if (Cookie::get('shopping_cart'))
                                            10
                                        @else
                                            0
                                        @endif
                                    </h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Grand Total</h5>
                                    <h5 class="font-weight-bold">Rs. @if (Cookie::get('shopping_cart'))
                                            {{ number_format($total + 10, 2) }}
                                        @else
                                            0
                                        @endif
                                    </h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="cart-checkout-btn text-center">
                                            @if (Auth::guard('webs')->user())
                                                <a href="{{ url('cart-checkout') }}"
                                                    class="btn btn-block btn-primary my-3 py-3">PROCCED
                                                    TO CHECKOUT</a>
                                            @else
                                                <a href="{{ url('/web-login') }}"
                                                    class="btn btn-block btn-primary my-3 py-3">PROCCED TO CHECKOUT</a>
                                                {{-- you add a pop modal for making a login --}}
                                            @endif
                                            <h6 class="mt-3">Checkout with Fabcart</h6>
                                        </div>
                                    </div>
                                </div>
                                {{-- <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


@endsection
