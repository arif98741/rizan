@extends('layout.admin.admin')
@section('title','Edit Food')
@section('content')

    {{--    {{ dd($errors) }}--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Food Updating Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Food</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <form action="{{ route('admin.offer.update',$offer->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label for="itemName" class="col-sm-2 col-form-label">Enter food name :</label>
                        <div class="col-sm-9">
                            <select name="food_id" id="food_items" required class="form-control select2">
                                <option>Select Food</option>
                                @foreach($foods as $food)

                                    <option value="{{ $food->id }}"
                                            @if($food->id == $offer->food_id) selected @endif>{{ $food->name }}</option>

                                @endforeach
                            </select>
                            @error('food_id')
                            <p class="text-red mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{ $offer->food->price }}tk" readonly id="price"
                                   class="form-control">
                            @error('price')
                            <p class="text-red mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <img style="height: 80%; width: 40%"
                                 src="{{ asset('uploads/food/thumbnail/'.$offer->food->feature_photo)}}" id="thumbnail">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Offer Price</label>
                        <div class="col-sm-9">
                            <input type="number" name="offer_price"
                                   value="{{ (!empty(old('offer_price'))) ?old('offer_price'): $offer->offer_price  }}"
                                   class="form-control">
                            @error('offer_price')
                            <p class="text-red mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-9">
                            <input type="date" name="start_date"
                                   value="{{ (!empty(old('start_date'))) ?old('start_date'): $offer->start_date  }}"
                                   class="form-control">
                            @error('start_date')
                            <p class="text-red mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-9">
                            <input type="date" name="end_date"
                                   value="{{ (!empty(old('end_date'))) ?old('end_date'): $offer->end_date  }}"
                                   class="form-control">
                            @error('end_date')
                            <p class="text-red mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Offer Description</label>
                        <div class="col-sm-9">
                    <textarea class="form-control" name="offer_description"
                              placeholder="Enter description">{{ (!empty(old('offer_description'))) ?old('offer_description'): $offer->offer_description  }}</textarea>
                            @error('offer_description')
                            <p class="text-red mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary formSubmit">Update</button>
                        </div>
                    </div>
                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    @push('extra-css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
        <style>
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #444;
                line-height: 22px;
            }
        </style>

    @endpush
    @push('extra-js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function () {

                /**
                 * contact check ins database
                 */
                $('#food_items').change(function () {
                    let food_id = $(this).val();
                    if (food_id == '') {
                        $('#contact-message').html('You must select restaurant');
                    } else {
                        $.ajax({
                            'url': '{{ url('api/restaurant/single_food') }}',
                            'dataType': 'json',
                            'method': 'post',
                            'data': {
                                'food_id': food_id,
                                'token': '$2y$10$a0ysRqMZxVO/8XJCNMyAouXBvwXoj5yP8.KkiRePF3lX2dOW52llK'
                            },
                            'success': function (response) {
                                //TODO:: change here
                                if (response.code == '200') {
                                    $('#price').val(response.data.price + 'tk');
                                    $('#thumbnail').removeAttr('src');
                                    $('#thumbnail').delay(2000).attr(
                                        "src", "{{  asset('uploads/food/thumbnail/')}}/" + response.data.feature_photo
                                    );
                                } else {
                                    $('#price').val('');
                                }
                            }, error: function (e) {
                                console.log(e);
                            }
                        })
                    }

                });

                //select 2
                $('.select2').select2();
            });
        </script>
    @endpush

@endsection

