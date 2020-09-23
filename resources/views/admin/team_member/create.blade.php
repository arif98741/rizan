@extends('layout.admin.admin')
@section('title','Add Team Member')
@section('content')

    {{--    {{ dd($errors) }}--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Food Saving Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Team Member</li>
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
                                <h3 class="card-title">Add Team Member</h3>
                            </div>

                            <form role="form" action="{{ route('admin.team_member.store') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                       class="form-control"
                                                       id="name"
                                                       placeholder="Enter name">

                                                @error('name')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>

                                            <div class="form-group">
                                                <label for="location">Designation</label>
                                                <input type="text" name="designation" value="{{ old('description') }}"
                                                       class="form-control" id="designation"
                                                       placeholder="Enter designation">
                                                @error('designation')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="location">Twitter</label>
                                                <input type="text" name="twitter" value="{{ old('twitter') }}"
                                                       class="form-control" id="twitter"
                                                       placeholder="Enter twitter">
                                                @error('twitter')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Facebook</label>
                                                <input type="text" name="facebook" value="{{ old('facebook') }}"
                                                       class="form-control" id="facebook"
                                                       placeholder="Enter facebook">
                                                <p class="text-red mt-1" id="email-message"></p>
                                                @error('facebook')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Instagram</label>
                                                <input type="text" name="instagram" value="{{ old('instagram') }}"
                                                       class="form-control" id="instagram"
                                                       placeholder="Enter instagram">
                                                <p class="text-red mt-1" id="email-message"></p>
                                                @error('instagram')
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

