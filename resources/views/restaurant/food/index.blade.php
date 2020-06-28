@extends('layout.restaurant.restaurant')
@section('title','Dashboard')
@section('content')
    <main class="appContent-res-adm" id="appcontnt">
        <div class="content-wrapper">

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
                                <h3 class="card-title">Food list</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="5%">Serial</th>
                                        <th width="20%">Name</th>
                                        <th width="20%">Restaurant</th>
                                        <th width="10%">Price</th>
                                        <th width="20%">Description</th>
                                        <th width="10%">Photo</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($foods as $key=> $food)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $food->name }}</td>
                                            <td>{{ $food->restaurant->name }}</td>

                                            <td>{{ $food->price }}TK</td>
                                            <td>{{ $food->description }}</td>
                                            <td><img style="width:80px; height: 60px;"
                                                     src="{{ asset('storage/uploads/food/thumbnail/'.$food->feature_photo) }}">
                                            </td>
                                            <td>
                                                <a href="{{ route('restaurant.food.edit',$food->id) }}"
                                                   class="btn btn-sm btn-primary">Edit</a>
                                                <a class="btn btn-warning btn-sm"
                                                   href="{{ route('restaurant.food.destroy',$food->id) }}"
                                                   onclick="event.preventDefault();
                                                       document.getElementById('vendor-delete-form{{ $food->id }}').submit();">
                                                    Delete
                                                </a>
                                                <form id="vendor-delete-form{{ $food->id }}"
                                                      onclick="return(confirm('are you sure to delete?'))"
                                                      action="{{ route('restaurant.food.destroy',$food->id) }}"
                                                      method="post" style="display: none;">
                                                    {{ csrf_field() }} @method('DELETE')
                                                </form>

                                                <a href="{{ url('food/'.$food->restaurant->slug.'/'.$food->slug) }}"
                                                   target="2"
                                                   class="btn btn-sm btn-success">View</a>


                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th width="10%">Serial</th>
                                        <th width="20%">Name</th>
                                        <th width="20%">Restaurant</th>
                                        <th width="10%">Price</th>
                                        <th width="20%">Description</th>
                                        <th width="10%">Photo</th>
                                        <th width="10%">Action</th>
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
    </main>
@endsection
