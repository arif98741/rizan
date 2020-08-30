@extends('layout.admin.admin')
@section('title','Add Feature Restaurant')
@section('content')

    {{--    {{ dd($errors) }}--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Restaurant Saving Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <div class="row">

                    <div class="col-md-10">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Feature Restaurant</h3>
                            </div>

                            <form role="form" action="{{ url('test/restaurant/feature/store') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Select Restaurant</label>
                                                <select name="restaurant_id" class="form-control">
                                                    <option value="" disabled selected>---</option>
                                                    @foreach($restaurants as $restaurant)

                                                        <option
                                                            value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('restaurant_id')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                                <label for="exampleInputEmail1">Select order</label>
                                                <select name="order" class="form-control">
                                                    <option value="" disabled selected>---</option>
                                                    @for($i=1; $i<=9; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                @error('restaurant_id')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection

