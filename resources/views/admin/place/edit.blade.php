@extends('layout.admin.admin')
@section('title','Edit Place')
@section('content')

    {{--    {{ dd($errors) }}--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Place Update Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Place</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <div class="row">

                    <div class="col-md-10">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                            </div>

                            <form role="form" action="{{ route('admin.place.update',$place->id) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Place Name</label>
                                                <input type="text" name="place_name" value="{{ $place->place_name }}"
                                                       class="form-control"
                                                       id="name"
                                                       placeholder="Enter place name">
                                                @error('place_name')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Location</label>
                                                <input type="text" name="location" value="{{ $place->location }}"
                                                       class="form-control"
                                                       id="name"
                                                       placeholder="Enter location">

                                                @error('location')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Slug</label>
                                                <input type="text" name="slug" value="{{ $place->slug }}"
                                                       class="form-control" id="slug"
                                                       placeholder="Enter slug" readonly>
                                                <p class="text-red mt-1" id="slug"></p>
                                                @error('price')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputFile">Feature Photo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="feature_photo"
                                                               class="custom-file-input">

                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="">Upload</span>
                                                    </div>

                                                </div>
                                                @error('feature_photo')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                                <br>
                                                <img style="width:80px; height: 60px;"
                                                     src="{{ asset('storage/uploads/place/thumbnail/'.$place->feature_photo) }}">


                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="location">Initial Details(প্রাথমিক বর্ণনা)</label>
                                                <textarea cols="4" rows="3" name="initial_details" class="form-control"
                                                          id="description"
                                                          placeholder="Enter initial_details"> {{ $place->initial_details }}</textarea>
                                                @error('initial_details')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>

                                            <div class="form-group">
                                                <label for="location">এই ট্যুরে যা যা দেখবেন:
                                                </label>
                                                <textarea cols="4" rows="3" name="tourist_attractions"
                                                          class="form-control"
                                                          id="description"
                                                          placeholder="Enter tourist attractions"> {{ $place->tourist_attractions }}</textarea>
                                                @error('tourist_attractions')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>

                                            <div class="form-group">
                                                <label for="location">যেভাবে যাবেন:
                                                </label>
                                                <textarea cols="4" rows="3" name="how_to_go" class="form-control"
                                                          tourist_attractions id="description"
                                                          placeholder="Enter how_to_go"> {{ $place->how_to_go }}</textarea>
                                                @error('how_to_go')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
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
    @push('extra-js')

        <script>
            $(document).ready(function () {
                /**
                 * email check ins database
                 */
                $('#email').blur(function () {
                    let email = $(this).val();
                    if (email == '') {
                        $('#email-message').html('Field must not be empty');
                    } else {
                        $.ajax({
                            'url': '{{ url('api/restaurant/check_email') }}',
                            'dataType': 'json',
                            'method': 'post',
                            'data': {
                                'email': email,
                                'token': '$2y$10$a0ysRqMZxVO/8XJCNMyAouXBvwXoj5yP8.KkiRePF3lX2dOW52llK'
                            },
                            'success': function (response) {
                                if (response.code == '200') {
                                    $('#email-message').html('Email already exist. Please Use another');
                                } else {
                                    $('#email-message').html('');
                                }
                            }, error: function (e) {
                                console.log(e);
                            }
                        })
                    }

                });

                /**
                 * contact check ins database
                 */
                $('#contact').blur(function () {
                    let contact = $(this).val();
                    if (contact == '') {
                        $('#contact-message').html('Field must not be empty');
                    } else {
                        $.ajax({
                            'url': '{{ url('api/restaurant/check_contact') }}',
                            'dataType': 'json',
                            'method': 'post',
                            'data': {
                                'contact': contact,
                                'token': '$2y$10$a0ysRqMZxVO/8XJCNMyAouXBvwXoj5yP8.KkiRePF3lX2dOW52llK'
                            },
                            'success': function (response) {
                                if (response.code == '200') {
                                    $('#contact-message').html('Contact already exist. Please Use another');
                                } else {
                                    $('#contact-message').html('');
                                }
                            }, error: function (e) {
                                console.log(e);
                            }
                        })
                    }

                });
            });
        </script>
    @endpush
@endsection

