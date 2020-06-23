@extends('layout.restaurant.restaurant')
@section('title','Dashboard')
@section('content')
    <main class="appContent-res-adm" id="appcontnt">
        <form>
            <div class="form-group row">
                <label for="itemName" class="col-sm-2 col-form-label">Enter food name :</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="itemName" placeholder="food name...">
                </div>
            </div>
            <div class="form-group row">
                <label for="foodPrice" class="col-sm-2 col-form-label">Enter food price :</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="foodPrice" placeholder="food price...">
                </div>
            </div>
            <div class="form-group row">
                <label for="foodImg" class="col-sm-2 col-form-label">Submit food image :</label>
                <div class="col-sm-9">
                    <input type="file" id="foodImg">
                </div>
            </div>
            <div class="form-group row">
                <label for="foodDesc" class="col-sm-2 col-form-label">Enter food description :</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="foodDesc" placeholder="food description..." cols="10"></textarea>
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
