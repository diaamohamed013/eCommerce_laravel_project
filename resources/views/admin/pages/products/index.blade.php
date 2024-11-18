@extends('admin.master')

@section('title', 'Products')

@section('headerPage', 'Products')

@section('admin-content')
    <div class="content-wrapper">
        @include('admin.layouts.breadcrumb')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        @include('inc.success')

                        <div class="card mt-3">
                            <div class="card-header">
                                <h4>Products
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-end">
                                        Add Product
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th width="40%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <img class="img-fluid" style="width: 90px;" src="{{ $category->image }}"
                                                        alt="{{ $category->name }}">
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.products.edit', $category->id) }}"
                                                        class="btn btn-success">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('admin.products.destroy', $category->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
