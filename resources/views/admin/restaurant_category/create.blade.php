@extends('layout.admin.admin')
@section('title','Add Restaurant')
@section('content')

    {{--    {{ dd($errors) }}--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Restaurant Category Saving Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Restaurant Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <div class="row">

                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Restaurant Category</h3>
                            </div>

                            <form role="form" action="{{ route('admin.restaurant_category.store') }}" method="post">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Restaurant Name</label>
                                                <input type="texxt" name="category_name" value="{{ old('category_name') }}" class="form-control"
                                                       id="name"
                                                       placeholder="Enter category name">

                                                @error('category_name')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
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
                               if(response.code == '200')
                               {
                                   $('#email-message').html('Email already exist. Please Use another');
                               }else{
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
                                if(response.code == '200')
                                {
                                    $('#contact-message').html('Contact already exist. Please Use another');
                                }else{
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

