@extends('layout.admin.admin')
@section('title','Edit Page')
@section('content')

    {{--    {{ dd($errors) }}--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Page Updating Form ({{ $page->page_title }})</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('test/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Page</li>
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
                                <h3 class="card-title">Edit Page</h3>
                            </div>

                            <form role="form" action="{{ route('admin.page.update',$page->id) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Page Name</label>
                                                <input readonly type="text" name="page_title"
                                                       value="{{ $page->page_title }}"
                                                       class="form-control"
                                                       id="page_title"
                                                       placeholder="Enter page title">

                                                @error('page_title')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Slug</label>
                                                <input readonly type="text" name="slug" value="{{ $page->slug }}"
                                                       class="form-control" id="slug"
                                                       placeholder="Enter slug">
                                                <p class="text-red mt-1" id="email-message"></p>
                                                @error('slug')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description</label>
                                                <textarea name="description" id="description" class="form-control"
                                                          placeholder="Enter price" cols="3"
                                                          rows="3">{{$page->description}}</textarea>

                                                @error('price')
                                                <p class="text-red mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @if($page->slug == 'about-us')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Object Description</label>
                                                    <textarea name="object_description" id="object_description"
                                                              class="form-control"
                                                              placeholder="Enter price" cols="3"
                                                              rows="3">{{$page->object_description}}</textarea>

                                                    @error('object_description')
                                                    <p class="text-red mt-1">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
        <script src='{{ asset('asset/back/dist/js/tinymce.js') }}'></script>
        <script>
            tinymce.init({
                selector: '#description'
            });
            tinymce.init({
                selector: '#object_description'
            });

        </script>


    @endpush
@endsection

