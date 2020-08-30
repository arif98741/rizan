@extends('layout.admin.admin')
@section('title','Food ')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Feature Food</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('test/food/feature/add') }}"> Add
                                    Feature Food</a></li>
                            <li class="breadcrumb-item active">Feature Food list</li>
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
                            <h3 class="card-title">Food list with details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Order</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($feature_foods as $key=> $feature_food)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $feature_food->food->name }}</td>
                                        <td>{{ $feature_food->order }}</td>
                                        <td><img style="width:80px; height: 60px;"
                                                 src="{{ asset('uploads/food/thumbnail/'.$feature_food->food->feature_photo) }}
                                                     ">
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                               href="{{ url('test/food/feature/delete',$feature_food->id) }}"
                                               onclick="event.preventDefault();
                                                   document.getElementById('vendor-delete-form{{ $feature_food->id }}').submit();">
                                                Delete
                                            </a>
                                            <form id="vendor-delete-form{{ $feature_food->id }}"
                                                  onclick="return(confirm('are you sure to delete?'))"
                                                  action="{{ url('test/food/feature/delete',$feature_food->id) }}"
                                                  method="post" style="display: none;">
                                                {{ csrf_field() }} @method('DELETE')
                                            </form>
                                            <a class="btn btn-success btn-sm" target="1"
                                               href="{{ url('food/'.$feature_food->restaurant->slug) }}"> View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>
            </div>

        </section>

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
