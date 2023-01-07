@extends('admin.includes.layout')
@section('title', 'Edit Product')

@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-8">
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
                            <h1>Edit Product</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            @foreach ($editProductData as $items)

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" action="{{ Route('update-product-data') }}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="product_id" value="{{$items['id']}}">
                                    @csrf

                                    <div class="row col-md-12">
                                        <div class="form-group row col-md-6">
                                            <label for="edit_category_name" class="col-sm-4 col-form-label">Category Name</label>
                                            <div class="col-sm-10">
                                                <select name="edit_category_name" id="edit_category_name" class="form-control">
                                                        <option value="{{ $items['category_id'] }}">
                                                            {{ $items['category']['category_name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('edit_category_name'))
                                                    <div class="text-danger">{{ $errors->first('edit_category_name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="edit_sub_category_name" class="col-sm-4 col-form-label">Sub Category
                                                Name</label>
                                            <div class="col-sm-10">
                                                <select name="edit_sub_category_name" id="edit_sub_category_name" class="form-control"
                                                    value="{{ old('sub_category_name') }}">
                                                    {{-- <option value="" disabled>Select Sub Category</option> --}}
                                                    <option value="{{ $items['sub_category_id'] }}">
                                                        {{ $items['SubCategory']['sub_category_name'] }}
                                                    </option>
                                                </select>
                                                @if ($errors->has('edit_sub_category_name'))
                                                    <div class="text-danger">{{ $errors->first('edit_sub_category_name') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row col-md-6">
                                            <label for="edit_product_title" class="col-sm-4 col-form-label">Product
                                                Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="edit_product_title" class="form-control"
                                                    id="edit_product_title" value="{{ $items['title'] }}">
                                                @if ($errors->has('edit_product_title'))
                                                    <div class="text-danger">{{ $errors->first('edit_product_title') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="edit_product_description" class="col-sm-4 col-form-label">Product
                                                Description</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="edit_product_description" class="form-control" id="edit_product_description" placeholder="Enter Product Description">{{ $items['description'] }}</textarea>
                                                @if ($errors->has('edit_product_description'))
                                                    <div class="text-danger">{{ $errors->first('edit_product_description') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="edit_product_long_description" class="col-sm-8 col-form-label">Product
                                                Long Description</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="edit_product_long_description" class="form-control" id="edit_product_long_description"
                                                    placeholder="Enter Product Long Description">{{ $items['long_description'] }}</textarea>
                                                @if ($errors->has('edit_product_long_description'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('edit_product_long_description') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="edit_product_regular_price" class="col-sm-8 col-form-label">Product
                                                Regular Price</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="edit_product_regular_price" class="form-control"
                                                    id="edit_product_regular_price" placeholder="Enter Product Regular Price"
                                                    value="{{ $items['regular_price'] }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" />
                                                @if ($errors->has('edit_product_regular_price'))
                                                    <div class="text-danger">{{ $errors->first('edit_product_regular_price') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="edit_product_sale_price" class="col-sm-8 col-form-label">Product Sale
                                                Price</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="edit_product_sale_price" class="form-control"
                                                    id="edit_product_sale_price" placeholder="Enter Product Sale Price"
                                                    value="{{ $items['sale_price'] }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" />
                                                @if ($errors->has('edit_product_sale_price'))
                                                    <div class="text-danger">{{ $errors->first('edit_product_sale_price') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="edit_product_image" class="col-sm-8 col-form-label">Product
                                                Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="edit_product_image" class="form-control"
                                                    id="edit_product_image">
                                                <img src="{{ asset('uploads/addProduct/'.$items['image']) }}"
                                                    alt="" width="120px">
                                                @if ($errors->has('edit_product_image'))
                                                    <div class="text-danger">{{ $errors->first('edit_product_image') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-12">
                                            <label for="edit_product_gallary_image" class="col-sm-8 col-form-label">Product
                                                Gallary Images</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="edit_product_gallary_image[]" multiple
                                                    class="form-control" id="edit_product_gallary_image">
                                                @php
                                                    $allImages = explode(',', $items['product_gallary_image']);
                                                @endphp
                                                @foreach ($allImages as $imagess)
                                                    <img src="{{ asset('uploads/addGallaryProduct/' . $imagess) }}"
                                                        alt="" style="margin: 15px;" width="100px" height="100px">
                                                @endforeach
                                                @if ($errors->has('edit_product_gallary_image'))
                                                    <div class="text-danger">{{ $errors->first('edit_product_gallary_image') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row col-md-6">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
    </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#category_name', function() {
                var cate_id = $(this).val();
                // alert(cate_id);

                $.ajax({
                    type: "POST",
                    url: "{{ Route('getdata') }}",
                    data: {
                        cate_id: cate_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        $('#sub_category_name').empty();
                        $('#sub_category_name').append(
                            '<option disabled selected>Select Sub Category</option>' +
                            response);
                    }
                });
            });

        });
    </script>

@endsection
