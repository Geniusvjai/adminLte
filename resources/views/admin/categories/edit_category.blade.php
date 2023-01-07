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
                                <li class="breadcrumb-item"><a href="{{url('/admin/category')}}">Home</a></li>
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
                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal" action="{{url('update-category/'.$editCategoryData->id)}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="category_name" class="col-sm-4 col-form-label">Category Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="category_name" class="form-control"
                                                    id="category_name" placeholder="Enter Category Name" value="{{ $editCategoryData->category_name }}">
                                                @if ($errors->has('category_name'))
                                                    <div class="text-danger">{{ $errors->first('category_name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label for="email" class="col-sm-4 col-form-label">Category Slug
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="category_slug" class="form-control"
                                                    id="category_slug" placeholder="Enter Category Slug" value="{{ $editCategoryData->category_slug }}">
                                                @if ($errors->has('category_slug'))
                                                    <div class="text-danger">{{ $errors->first('category_slug') }}</div>
                                                @endif
                                            </div>
                                        </div> --}}

                                        <div class="form-group row">
                                            <div class=" col-sm-10">
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
