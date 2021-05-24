<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}
    </a>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon la'><img
                src="{{asset('icons/category_black.svg')}}" alt="Categories"></i> Categories</a></li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('ingredient') }}'>
        <i class='nav-icon la'><img src="{{asset('icons/restaurant_black.svg')}}" alt="orders"></i>
        Ingredients
    </a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('order') }}'>
        <i class='nav-icon la'><img src="{{asset('icons/list_alt_black.svg')}}" alt="Orders"></i>
        Orders
    </a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('product') }}'>
        <i class='nav-icon la'><img src="{{asset('icons/fastfood_black.svg')}}" alt="Products"></i>
        Products
    </a>
</li>
