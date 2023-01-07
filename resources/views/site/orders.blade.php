@extends('site.site-main')

@section('title', 'Shop')

@section('content')

    <!-- Page Header Start -->
    <div class="cars" style="padding: 0 15px">
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 180px">
                @if (!empty($CatData))
                    @foreach ($CatData as $cat)
                        <h1 class="font-weight-semi-bold text-uppercase mb-3">
                            {{ $cat->category_name }}
                        </h1>
                    @endforeach
                @else
                    <h1 class="font-weight-semi-bold text-uppercase mb-3"> All orders
                    </h1>
                @endif
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Orders</p>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Order Id</th>
                <th>Order Name</th>
                {{-- <th>Order Color</th>
                <th>Order Size</th>
                <th>Order Quantity</th> --}}
                <th>Status</th>
                <th>Order Date</th>
            </tr>
            @foreach ($userOrderDetailsData as $key => $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="javascript:void(0)" class="openOrder" data-id="{{ $value['id'] }}" data-toggle="modal" data-target="#myModal">{{ $value['order_id'] }}</a></td>
                    <td>{{ $value['product_name'] }}</td>
                    {{-- <td>{{ $value['product_size'] }}</td> --}}
                    {{-- <td>{{ $value['product_quantity'] }}</td> --}}
                    {{-- <td>${{ $value['product_price'] * $value['product_quantity'] }}</td> --}}
                    <td>{{ $value['status'] }}</td>
                    <td>{{ $value['created_at'] }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <!-- Page Header End -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Header</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            {{-- <th>#</th> --}}
                            <th>Order Id</th>
                            <th>Order Name</th>
                            <th>Order Color</th>
                            <th>Order Size</th>
                            <th>Order Quantity</th>
                            <th>Order Amount</th>
                            <th>Order Image</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                            <tr>
                                {{-- <td><span id=""></span></td> --}}
                                <td><span id="order_id"></span></td>
                                <td><span id="order_name"></span></td>
                                <td><span id="order_color"></span></td>
                                <td><span id="order_size"></span></td>
                                <td><span id="order_quantity"></span></td>
                                <td><span id="order_amount"></span></td>
                                <td> <img src="" id="order_image" alt="" width="80px"></td>
                                <td><span id="order_status"></span></td>
                                <td><span id="order_date"></span></td>
                                <td><a href=""><img src="site-asset/img/PDF_file_icon.svg.png" alt="" width="20px"></a></td>
                            </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Shop End -->
@endsection
