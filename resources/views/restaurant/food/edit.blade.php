@extends('layout.restaurant.restaurant')
@section('title','Edit Food')
@section('content')
    <main class="appContent-res-adm" id="appcontnt">
        <form action="{{ route('restaurant.product.update',$food->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group row">
                <label for="itemName" class="col-sm-2 col-form-label">Enter food name :</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" value="{{ $food->name }}" placeholder="food name...">
                    @error('name')
                    <p class="text-red mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Enter food price</label>
                <div class="col-sm-9">
                    <input type="number" name="price" class="form-control" value="{{ $food->price }}" placeholder="Enter price">
                    @error('price')
                    <p class="text-red mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="description" placeholder="Enter description">{{ $food->description }}</textarea>
                    @error('description')
                    <p class="text-red mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="foodImg" class="col-sm-2 col-form-label">Submit food image :</label>
                <div class="col-sm-9">
                    <input type="file" name="feature_photo" id="foodImg">
                    @error('feature_photo')
                    <p class="text-red mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-9">
                    <button type="submit" class="btn formSubmit">Submit</button>
                </div>
            </div>
        </form>
    </main>

@endsection
