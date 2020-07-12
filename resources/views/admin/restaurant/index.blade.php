@extends('layout.admin.admin')
@section('title','Restaurant ')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Restaurant</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Restaurant list</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @if(Session::has('success'))
                <p class="alert alert-success" id="message">{{ Session::get('success') }}</p>
            @endif @if(Session::has('error'))
                <p class="alert alert-warning" id="message">{{ Session::get('error') }}</p>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Restaurant list with details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($restaurants as $key=> $restaurant)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $restaurant->name }}</td>
                                        <td>{{ $restaurant->location }}</td>
                                        <td>{{ $restaurant->email }}</td>
                                        <td><img style="width:80px; height: 60px;"
                                                 src="{{ asset('uploads/restaurant/thumbnail/'.$restaurant->feature_photo) }}
                                                     ">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.restaurant.edit',$restaurant->id) }}"
                                               class="btn btn-sm btn-primary">Edit</a>
                                            <a class="btn btn-warning btn-sm"
                                               href="{{ route('admin.restaurant.destroy',$restaurant->id) }}"
                                               onclick="event.preventDefault();
                                                   document.getElementById('vendor-delete-form{{ $restaurant->id }}').submit();">
                                                Delete
                                            </a>
                                            <form id="vendor-delete-form{{ $restaurant->id }}"
                                                  onclick="return(confirm('are you sure to delete?'))"
                                                  action="{{ route('admin.restaurant.destroy',$restaurant->id) }}"
                                                  method="post" style="display: none;">
                                                {{ csrf_field() }} @method('DELETE')
                                            </form>
                                            <a class="btn btn-success btn-sm" target="1"
                                               href="{{ url('restaurant/view/'.$restaurant->slug) }}"> View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    @push('extra-css')
        <link rel="stylesheet" href="{{ asset('asset/back/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    @endpush

    @push('extra-js')
        <script src="{{ asset('asset/back/plugins/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{ asset('asset/back/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
        <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });
            });
        </script>
    @endpush
@endsection
