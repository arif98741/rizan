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
                                <h3 class="card-title">Offer list</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="5%">Serial</th>
                                        <th width="20%">Food</th>
                                        <th width="10%">Price</th>
                                        <th width="10%">Offer Price</th>
                                        <th width="20%">Start</th>
                                        <th width="20%">End</th>
                                        <th width="10%">Photo</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($offers as $key=> $offer)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $offer->food->name }}</td>
                                            <td>{{ $offer->food->price }}TK</td>
                                            <td>{{ $offer->offer_price }}TK</td>
                                            <td>{{ date('d-m-Y',strtotime($offer->start_date)) }}</td>
                                            <td>{{ date('d-m-Y',strtotime($offer->end_date)) }}</td>
                                            <td><img style="width:80px; height: 60px;"
                                                     src="{{ asset('storage/uploads/food/thumbnail/'.$offer->food->feature_photo) }}">
                                            </td>
                                            <td>
                                                <a href="{{ route('restaurant.offer.edit',$offer->id) }}"
                                                   class="btn btn-sm btn-primary">Edit</a>
                                                <a class="btn btn-warning btn-sm"
                                                   href="{{ route('restaurant.offer.destroy',$offer->id) }}"
                                                   onclick="event.preventDefault();
                                                       document.getElementById('vendor-delete-form{{ $offer->id }}').submit();">
                                                    Delete
                                                </a>
                                                <form id="vendor-delete-form{{ $offer->id }}"
                                                      onclick="return(confirm('are you sure to delete?'))"
                                                      action="{{ route('restaurant.offer.destroy',$offer->id) }}"
                                                      method="post" style="display: none;">
                                                    {{ csrf_field() }} @method('DELETE')
                                                </form>

                                                <a href="{{ url('food/offer/'.$offer->id) }}"
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
    </main>
@endsection
