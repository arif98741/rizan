<aside class="sideMenu-res-adm" id="sideMnu">
    <div class="sideTop">
        <div class="text">
            <h5 class="name">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h5>
        </div>
    </div>
    <div class="sideBottom">
{{--        cchnages here--}}
        <ul>
            <li>
                <a class="aActive" href="./add-item-admin.html" style="border-color: #1A237E">
                    <i class="fas fa-palette"></i>
                    <span>Add Food Item</span>
                </a>
            </li>
            <li>
                <a href="./add-offer-admin.html">
                    <i class="fas fa-chart-pie"></i>
                    <span>Add an Offer</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
