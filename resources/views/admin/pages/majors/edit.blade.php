@extends('admin.master')

@section('title', 'Home')

@section('headerPage', 'Update Major')

@section('admin-content')
    <div class="content-wrapper">
        @include('admin.layouts.breadcrumb')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('site.inc.success')
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <form method="POST" action="{{ route('admin.majors.update', $major->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ old('title', $major->title) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image"
                                                    name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="{{ asset($major->image) }}" alt="{{ $major->title }}" width="100"
                                                height="100">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
