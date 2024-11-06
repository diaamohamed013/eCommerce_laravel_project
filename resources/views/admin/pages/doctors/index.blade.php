@extends('admin.master')

@section('title', 'Home')

@section('headerPage', 'All Doctors')

@section('admin-content')
    <div class="content-wrapper">
        @include('admin.layouts.breadcrumb')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <a class="btn btn-primary mb-3" href="{{ route('admin.doctors.create') }}">
                    Add Doctor
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
                                    <th>Major</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>
                                            <img class="profile-user-img img-fluid img-circle" src="{{ FileHelper::get_file_url($doctor->doctor_image) }}" title="{{$doctor->name}}">
                                        </td>
                                        <td>{{ $doctor->major->title }}</td>
                                        <td>
                                            <div class="d-flex" style="gap: 10px;">
                                                <a href="{{ route('admin.doctors.edit', $doctor->id) }}"
                                                    class="btn btn-secondary">
                                                    Edit
                                                </a>
                                                <form  action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST">
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
