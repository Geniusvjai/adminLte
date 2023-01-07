@extends('admin.includes.layout')
@section('title', 'Add Category')


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
                            <h1>Add Category</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">Category</li>
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
                                    <form class="form-horizontal" action="{{ Route('add-sub-cat') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="category_name" class="col-sm-4 col-form-label">Category Name</label>
                                            <div class="col-sm-10">
                                                
                                                <select name="category_id" id="category_id" class="form-control">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $item)
                                                    <option value="{{ $item->id}}">{{$item->category_name}}</option>
                                                    @endforeach
                                                </select>
                                                    @if ($errors->has('category_id'))
                                                    <div class="text-danger">{{ $errors->first('category_id') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="sub_category_name" class="col-sm-4 col-form-label">Sub Category Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="sub_category_name" class="form-control"
                                                    id="sub_category_name" placeholder="Enter Category Name">
                                                    @if ($errors->has('sub_category_name'))
                                                    <div class="text-danger">{{ $errors->first('sub_category_name') }}</div>
                                                @endif
                                            </div>
                                        </div>
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
