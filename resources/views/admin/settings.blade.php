@extends('layout.admin.admin')
@section('title','Setting')
@section('content')

    {{--    {{ dd($errors) }}--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Website Settings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Setting</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                @if(Session::has('success'))
                    <p class="alert alert-success" id="message">{{ Session::get('success') }}</p>
                @endif @if(Session::has('error'))
                    <p class="alert alert-warning" id="message">{{ Session::get('error') }}</p>
                @endif


                <div class="row">

                    <div class="col-md-10">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Setting</h3>
                            </div>

                            <form role="form" action="{{ route('admin.setting') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Contact</label>
                                                <input type="text" name="contact"
                                                       value="{{ (!empty(old('contact'))) ? old('contact') : $setting->contact }}"
                                                       class="form-control"
                                                       id="contact"
                                                       placeholder="Enter contact number">

                                                @error('contact')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>


                                            <div class="form-group">
                                                <label for="location">Email</label>
                                                <input type="text" name="email"
                                                       value="{{ (!empty(old('email'))) ? old('email') : $setting->email }}"
                                                       class="form-control" id="email"
                                                       placeholder="Enter email">
                                                @error('email')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="location">Facebook</label>
                                                <input type="text" name="facebook"
                                                       value="{{ (!empty(old('facebook'))) ? old('facebook') : $setting->facebook }}"
                                                       class="form-control" id="facebook"
                                                       placeholder="Enter facebook">
                                                @error('facebook')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>

                                            <div class="form-group">
                                                <label for="location">Twitter</label>
                                                <input type="text" name="twitter"
                                                       value="{{ (!empty(old('twitter'))) ? old('twitter') : $setting->twitter }}"
                                                       class="form-control" id="twitter"
                                                       placeholder="Enter twitter">
                                                @error('twitter')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="location">Analytics</label>
                                                <input type="text" name="analytics"
                                                       value="{{ (!empty(old('analytics'))) ? old('analytics') : $setting->analytics }}"
                                                       class="form-control" id="analytics"
                                                       placeholder="Enter analytics">
                                                @error('analytics')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Slogan</label>
                                                <input type="text" name="slogan"
                                                       value="{{ (!empty(old('slogan'))) ? old('slogan') : $setting->slogan }}"
                                                       class="form-control" id="slogan"
                                                       placeholder="Enter slogan">
                                                <p class="text-red mt-1" id="email-message"></p>
                                                @error('slogan')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Address</label>
                                                <input type="text" name="address"
                                                       value="{{ (!empty(old('address'))) ? old('address') : $setting->address }}"
                                                       class="form-control" id="address"
                                                       placeholder="Enter address">
                                                <p class="text-red mt-1" id="email-message"></p>
                                                @error('address')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="location">Instagram</label>
                                                <input type="text" name="instagram"
                                                       value="{{ (!empty(old('instagram'))) ? old('instagram') : $setting->instagram }}"
                                                       class="form-control" id="instagram"
                                                       placeholder="Enter instagram">
                                                @error('instagram')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="location">Pinterest</label>
                                                <input type="text" name="pinterest"
                                                       value="{{ (!empty(old('pinterest'))) ? old('pinterest') : $setting->pinterest }}"
                                                       class="form-control" id="pinterest"
                                                       placeholder="Enter pinterest">
                                                @error('pinterest')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="location">Change Password</label>
                                                <input type="text" name="password"
                                                       class="form-control"
                                                       placeholder="Enter new password">
                                                @error('password')
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

