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
                            <li class="breadcrumb-item active">Add Restaurant</li>
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
                                <h3 class="card-title">Add Restaurant</h3>
                            </div>

                            <form role="form" action="{{ route('admin.restaurant.store') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Restaurant Name</label>
                                                <input type="texxt" name="name" value="{{ old('name') }}"
                                                       class="form-control"
                                                       id="name"
                                                       placeholder="Enter restaurant name">

                                                @error('restaurant_name')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Select Category</label>
                                                <select name="restaurant_id" class="form-control">
                                                    <option value="" disabled selected>---</option>
                                                    @foreach($restaurants as $restaurant)

                                                        <option
                                                            value="{{ $restaurant->id }}"
                                                           ></option>{{ $restaurant->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('restaurant_category_id')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>


                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input type="text" name="location" value="{{ old('location') }}"
                                                       class="form-control" id="address"
                                                       placeholder="Enter address ">
                                                @error('location')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" name="slug" value="{{ old('slug') }}"
                                                       class="form-control" id="slug"
                                                       placeholder="Slug address" readonly>
                                                @error('slug')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="website">Facebook URL</label>
                                                <input type="text" name="facebook" value="{{ old('facebook') }}"
                                                       class="form-control" id="facebook"
                                                       placeholder="Enter facebook here">
                                                @error('facebook')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="instagram">Instagram</label>
                                                <input type="text" name="instagram" value="{{ old('instagram') }}"
                                                       class="form-control" id="instagram"
                                                       placeholder="Enter instagram address here">
                                                @error('instagram')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="text" name="email" value="{{ old('email') }}"
                                                       class="form-control" id="email"
                                                       placeholder="Enter email">
                                                <p class="text-red mt-1" id="email-message"></p>
                                                @error('email')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Contact Number</label>
                                                <input type="text" name="contact" value="{{ old('contact') }}"
                                                       class="form-control" id="contact"
                                                       placeholder="Enter contact number">
                                                <p class="text-red mt-1" id="contact-message"></p>
                                                @error('contact')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                       id="password"
                                                       placeholder="Password">
                                                @error('password')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                <input type="text" name="website" value="{{ old('website') }}"
                                                       class="form-control" id="website"
                                                       placeholder="Enter website address here">
                                                @error('website')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Feature Photo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="feature_photo"
                                                               class="custom-file-input"
                                                               id="exampleInputFile">
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
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputFile">Cover Photo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="cover_photo" class="custom-file-input"
                                                               id="cover_photo">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="">Upload</span>
                                                    </div>
                                                </div>
                                                @error('cover_photo')
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

