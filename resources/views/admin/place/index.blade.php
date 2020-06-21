@extends('layout.admin.admin')
@section('title','Place List ')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Place</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Place list</li>
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
                            <h3 class="card-title">Place list with details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="5%">Serial</th>
                                    <th width="20%">Place Name</th>
                                    <th width="20%">Location</th>
                                    <th width="20%">Tourist Attractions</th>
                                    <th width="10%">Photo</th>
                                    <th width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($places as $key=> $place)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $place->place_name }}</td>
                                        <td>{{ $place->location }}</td>
                                        <td>{{  substr($place->tourist_attractions   ,0,30) }}</td>
                                        <td><img style="width:80px; height: 60px;"
                                                 src="{{ asset('storage/uploads/place/thumbnail/'.$place->feature_photo) }}">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.place.edit',$place->id) }}"
                                               class="btn btn-sm btn-primary">Edit</a>
                                            <a class="btn btn-warning btn-sm"
                                               href="{{ route('admin.place.destroy',$place->id) }}"
                                               onclick="event.preventDefault();
                                                   document.getElementById('vendor-delete-form{{ $place->id }}').submit();">
                                                Delete
                                            </a>
                                            <form id="vendor-delete-form{{ $place->id }}"
                                                  onclick="return(confirm('are you sure to delete?'))"
                                                  action="{{ route('admin.place.destroy',$place->id) }}"
                                                  method="post" style="display: none;">
                                                {{ csrf_field() }} @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

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
