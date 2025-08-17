@php
    use App\Models\MyCart;

    $ischeck = auth()->check();

    $userId = $ischeck ? auth()->user()->id : 0;
    
    $carts = MyCart::where('user_id', $userId)->get();

    $totalQty = 0;
    $totalAmt = 0;

    foreach ($carts as $cart) {
        $totalQty += $cart->qty;
        $totalAmt += $cart->qty * $cart->price;
    }
 @endphp

 <ul>
     <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
     <li>
        @if($ischeck)
            <a href="{{ route('shop.shoppingCart') }}">
                <i class="fa fa-shopping-bag"></i>
                <span class="cart-qty">{{ $totalQty }}</span>
            </a>
        @else
            <a href="#loginModal" data-toggle="modal">
                <i class="fa fa-shopping-bag"></i>
                <span class="cart-qty">0</span>
            </a>
        @endif
     </li>
 </ul>
 <div class="header__cart__price">
     item: <span class="cart-amount">{{ number_format($totalAmt, 2) }}</span>
     <span>THB</span>
 </div>
