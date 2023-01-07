@extends('admin.includes.layout')
@section('title', 'Add Product')

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
                            <h1>Add Product</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">Product</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>


            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" action="{{ Route('insert-product') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row col-md-12">
                                        <div class="form-group row col-md-6">
                                            <label for="category_name" class="col-sm-4 col-form-label">Category Name</label>
                                            <div class="col-sm-10">
                                                <select name="category_name" id="category_name" class="form-control"
                                                    value="{{ old('category_name') }}">
                                                    <option value="" disabled selected>Select Category</option>
                                                    @foreach ($FetchCategory as $items)
                                                        <option value="{{ $items['id'] }}">{{ $items['category_name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('category_name'))
                                                    <div class="text-danger">{{ $errors->first('category_name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="sub_category_name" class="col-sm-4 col-form-label">Sub Category
                                                Name</label>
                                            <div class="col-sm-10">
                                                <select name="sub_category_name" id="sub_category_name" class="form-control"
                                                    value="{{ old('sub_category_name') }}">
                                                    <option value="" disabled selected>Select Sub Category</option>
                                                </select>
                                                @if ($errors->has('sub_category_name'))
                                                    <div class="text-danger">{{ $errors->first('sub_category_name') }}</div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row col-md-6">
                                            <label for="product_title" class="col-sm-4 col-form-label">Product
                                                Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="product_title" class="form-control"
                                                    id="product_title" placeholder="Enter Product Title"
                                                    value="{{ old('product_title') }}">
                                                @if ($errors->has('product_title'))
                                                    <div class="text-danger">{{ $errors->first('product_title') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="product_size" class="col-sm-4 col-form-label">Product
                                                Size</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="product_size" class="form-control"
                                                    id="product_title" placeholder="ex. s, m, xl etc."
                                                    value="{{ old('product_size') }}">
                                                @if ($errors->has('product_size'))
                                                    <div class="text-danger">{{ $errors->first('product_size') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="product_color" class="col-sm-4 col-form-label">Product
                                                Color</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="product_color" class="form-control"
                                                    id="product_color" placeholder="ex. red, black, green etc."
                                                    value="{{ old('product_color') }}">
                                                @if ($errors->has('product_color'))
                                                    <div class="text-danger">{{ $errors->first('product_color') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="product_description" class="col-sm-4 col-form-label">Product
                                                Description</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="product_description" class="form-control" id="product_description"
                                                    placeholder="Enter Product Description" value="{{ old('product_description') }}"></textarea>
                                                @if ($errors->has('product_description'))
                                                    <div class="text-danger">{{ $errors->first('product_description') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="product_long_description" class="col-sm-8 col-form-label">Product
                                                Long Description</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="product_long_description" class="form-control" id="product_long_description"
                                                    placeholder="Enter Product Long Description" value="{{ old('product_long_description') }}"></textarea>
                                                @if ($errors->has('product_long_description'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('product_long_description') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="product_regular_price" class="col-sm-8 col-form-label">Product
                                                Regular Price</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="product_regular_price" class="form-control"
                                                    id="product_title" placeholder="Enter Product Regular Price">
                                                @if ($errors->has('product_regular_price'))
                                                    <div class="text-danger">{{ $errors->first('product_regular_price') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="product_sale_price" class="col-sm-8 col-form-label">Product Sale
                                                Price</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="product_sale_price" class="form-control"
                                                    id="product_sale_price" placeholder="Enter Product Sale Price">
                                                @if ($errors->has('product_sale_price'))
                                                    <div class="text-danger">{{ $errors->first('product_sale_price') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="product_image" class="col-sm-8 col-form-label">Product
                                                Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="product_image" class="form-control"
                                                    id="product_image">
                                                @if ($errors->has('product_image'))
                                                    <div class="text-danger">{{ $errors->first('product_image') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="product_gallary_image" class="col-sm-8 col-form-label">Product
                                                Gallary Images</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="product_gallary_image[]" multiple
                                                    class="form-control" id="product_gallary_image">
                                                @if ($errors->has('product_gallary_image'))
                                                    <div class="text-danger">{{ $errors->first('product_gallary_image') }}
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
