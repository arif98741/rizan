@extends('layout.admin.admin')
@section('title','Edit Restaurant')
@section('content')

    {{--    {{ dd($errors) }}--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Restaurant Updating Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Restaurant</li>
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
                                <h3 class="card-title">Edit Restaurant</h3>
                            </div>

                            <form role="form" action="{{ route('admin.restaurant.update',$restaurant->id) }}"
                                  enctype="multipart/form-data" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Restaurant Name</label>
                                                <input type="texxt" name="name" value="{{ $restaurant->name }}"
                                                       class="form-control"
                                                       id="name"
                                                       placeholder="Enter restaurant name">

                                                @error('restaurant_name')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Select Category</label>
                                                <select name="restaurant_category_id" class="form-control">
                                                    <option value="" disabled selected>---</option>
                                                    @foreach($restaurant_categories as $restaurant_category)

                                                        <option
                                                            value="{{ $restaurant_category->id }}"
                                                            @if($restaurant->restaurant_category_id == $restaurant_category->id) selected="" @endif>{{ $restaurant_category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('restaurant_category_id')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>


                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input type="text" name="location" value="{{ $restaurant->location }}"
                                                       class="form-control" id="address"
                                                       placeholder="Enter address ">
                                                @error('location')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" name="slug" value="{{ $restaurant->slug }}"
                                                       class="form-control" id="slug"
                                                       placeholder="Slug address" readonly>
                                                @error('slug')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="website">Facebook URL</label>
                                                <input type="text" name="facebook" value="{{ $restaurant->facebook }}"
                                                       class="form-control" id="facebook"
                                                       placeholder="Enter facebook here">
                                                @error('facebook')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="instagram">Instagram</label>
                                                <input type="text" name="instagram" value="{{ $restaurant->instagram }}"
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
                                                <input type="text" name="email" value="{{ $restaurant->email }}"
                                                       class="form-control" id="email"
                                                       placeholder="Enter email">
                                                <p class="text-red mt-1" id="email-message"></p>
                                                @error('email')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Contact Number</label>
                                                <input type="text" name="contact" value="{{ $restaurant->contact }}"
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
                                                <input type="text" name="website" value="{{ $restaurant->website }}"
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
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="slug">Map Code</label>
                                                <textarea rows="5" id="map_code" class="form-control"><iframe src="{{ $restaurant->map_code }}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></textarea>
                                                <input type="hidden" name="map_code" value="{{ $restaurant->map_code }}"
                                                       id="map_code_value">
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
                 * get src url from map code
                 */
                $('#map_code').change(function () {
                    var map_code = $(this).val();
                    var src = map_code.split('src=')[1].split(/[ >]/)[0];
                    console.log(src);
                    src = src.replace('"', '');
                    src = src.replace('"', '');
                    $('#map_code_value').val(src);
                });
            });
        </script>
    @endpush
@endsection

