@extends('admin.includes.layout')
@section('title', 'Edit Category')


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
                            <h1>Edit Category</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/subcategory') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Category</li>
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
                            <div class="col-md-8">
                                <div class="tab-pane" id="settings">
                                    @foreach ($editSubCategoryData as $SubCategoryData)
                                        <form class="form-horizontal" action="{{ Route('update-sub-category') }}"
                                            method="POST">
                                            <input type="hidden" name="sub_category_id"
                                                value="{{ $SubCategoryData['id'] }}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="edit_category_name" class="col-sm-4 col-form-label">Category
                                                    Name</label>
                                                <div class="col-sm-10">
                                                    <select name="edit_cat_name" id="edit_cat_name" class="form-control">
                                                        <option value="{{ $SubCategoryData['category']['id'] }}">
                                                            {{ $SubCategoryData['category']['category_name'] }}</option>
                                                    </select>
                                                    @if ($errors->has('edit_category_name'))
                                                        <div class="text-danger">{{ $errors->first('edit_category_name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="category_name" class="col-sm-4 col-form-label">Sub Category
                                                    Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="edit_sub_category_name" class="form-control"
                                                        id="edit_sub_category_name" placeholder="Enter Sub Category Name"
                                                        value="{{ $SubCategoryData['sub_category_name'] }}">
                                                    @if ($errors->has('edit_sub_category_name'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('edit_sub_category_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class=" col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
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
