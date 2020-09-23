@extends('layout.admin.admin')
@section('title','Page List ')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Page list</li>
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
                            <h3 class="card-title">Page list with details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="5%">Serial</th>
                                    <th width="20%">Name</th>
                                    <th width="20%">Slug</th>
                                    <th width="20%">Description</th>
                                    <th width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $key=> $page)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $page->page_title }}</td>
                                        <td>{{ $page->slug }}</td>
                                        <td>{{ substr($page->description,0,20) }}</td>

                                        <td>
                                            <a href="{{ route('admin.page.edit',$page->id) }}"
                                               class="btn btn-sm btn-primary">Edit</a>

                                            <a href="{{ url($page->slug) }}"
                                               target="2"
                                               class="btn btn-sm btn-success">View</a>

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
