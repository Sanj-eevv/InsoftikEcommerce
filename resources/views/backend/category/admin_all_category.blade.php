@extends('backend.admin_panel.admin_panel_main')
@section('admin')

<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title" style="display: inline;">Categories</h2>
                <a href="#" class="btn btn-outline-primary btn-sm float-right">Add Category</a>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Category</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Categories</li>
                        </ol>

                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
            <div class="card">
                <h5 class="card-header">Category Table</h5>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            @csrf
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($categoryData as $category)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-light">Edit</a>
                                        <a href="{{ route('admin.deleteCategory', $category->id) }}" class="btn btn-outline-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-34 col-sm-4 col-4">

            <div class="card">
                <h5 class="card-header">Add Category</h5>
                <div class="card-body">
                    <form novalidate="" method="POST" action="{{ route('admin.addCategory') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputText1" class="col-form-label">Category Name</label>
                            <input type="text" class="form-control" name="category_name" placeholder="Enter new category">
                            @error('category_name')
                            <span class="text-info">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection