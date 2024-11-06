@extends('admin.master')

@section('title', 'Home')

@section('headerPage', 'All Majors')

@section('admin-content')
    <div class="content-wrapper">
        @include('admin.layouts.breadcrumb')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <a class="btn btn-primary mb-3" href="{{ route('admin.majors.create') }}">
                    Add Major
                </a>
                <div class="row">
                    <div class="col-md-12">
                        @include('site.inc.success')
                    </div>
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($majors as $major)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $major->title }}</td>
                                        <td>
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ FileHelper::get_file_url($major->image) }}"
                                                title="{{ $major->title }}">
                                        </td>
                                        <td>
                                            <div class="d-flex" style="gap: 10px;">
                                                <a href="{{ route('admin.majors.edit', $major->id) }}"
                                                    class="btn btn-secondary">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.majors.destroy', $major->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
