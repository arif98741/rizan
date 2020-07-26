@extends('layout.admin.admin')
@section('title','Add Offer')
@section('content')
    <main class="appContent-res-adm" id="appcontnt">
        <form action="{{ route('restaurant.offer.store') }}" method="post">
            @method('post')
            @csrf
            <div class="form-group row">
                <label for="itemName" class="col-sm-2 col-form-label">Enter food name :</label>
                <div class="col-sm-9">
                    <select name="food_id" id="food_items" required class="form-control">
                        <option selected disabled>Select Food</option>
                        @foreach($foods as $food)
                            <option value="{{ $food->id }}">{{ $food->name }}</option>

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
                    <input type="text" readonly id="price" class="form-control">
                    @error('price')
                    <p class="text-red mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-9">
                    <img style="height: 80%; width: 40%" id="thumbnail">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Offer Price</label>
                <div class="col-sm-9">
                    <input type="number" name="offer_price" value="{{ old('offer_price') }}" class="form-control">
                    @error('offer_price')
                    <p class="text-red mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Start Date</label>
                <div class="col-sm-9">
                    <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control">
                    @error('start_date')
                    <p class="text-red mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">End Date</label>
                <div class="col-sm-9">
                    <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control">
                    @error('end_date')
                    <p class="text-red mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Offer Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="offer_description"
                              placeholder="Enter description">{{ old('offer_description') }}</textarea>
                    @error('offer_description')
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
    @push('extra-js')

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
                                'restaurant_id': <?php echo $restaurant ?>,
                                'token': '$2y$10$a0ysRqMZxVO/8XJCNMyAouXBvwXoj5yP8.KkiRePF3lX2dOW52llK'
                            },
                            'success': function (response) {

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
            });
        </script>
    @endpush

@endsection
