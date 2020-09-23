<aside class="sideMenu-res-adm" id="sideMnu">
    <div class="sideTop">
        <div class="text">
            <h5 class="name">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h5>
        </div>
    </div>
    <div class="sideBottom">

        <ul>
            <li>
                <a @if(url()->current() == url('restaurant/product')): class="aActive"
                   @endif href="{{ route('restaurant.product.index') }}" style="border-color: #1A237E">
                    <i class="fas fa-palette"></i>
                    <span>Food Items</span>
                </a>
            </li>
            <li>
                <a @if(url()->current() == url('restaurant/product/create')): class="aActive"
                   @endif href="{{ route('restaurant.product.create') }}">
                    <i class="fas fa-palette"></i>
                    <span>Add Food Item</span>
                </a>
            </li>
            <li>
                <a @if(url()->current() == url('restaurant/offer')): class="aActive"
                   @endif href="{{ route('restaurant.offer.index') }}">
                    <i class="fas fa-chart-pie"></i>
                    <span>Offers</span>
                </a>
            </li>
            <li>
                <a @if(url()->current() == url('restaurant/offer/create')): class="aActive"
                   @endif  href="{{ route('restaurant.offer.create') }}">
                    <i class="fas fa-chart-pie"></i>
                    <span>Add an Offer</span>
                </a>
            </li>


        </ul>
    </div>
</aside>
