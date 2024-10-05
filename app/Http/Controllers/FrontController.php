<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;

use session;

class FrontController extends Controller
{
    public function index(){
         $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
        $products = Product::all(); // Fetch all products from the database
        return view("Front.index", compact('products', 'totalCartItems'));
    }

    public function contact(){
                 $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
        return view("Front.contact" , compact( 'totalCartItems'));
    }

    public function shop(){
        $totalCartItems = 0; // Default to 0 for non-logged-in users
        $products = Product::all(); // Fetch all products from the database
        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
        return view("Front.shop"  , compact( 'totalCartItems', 'products'));

    }

    public function productDetails($id){
        $product = Product::find($id); // Fetch the product by ID
        $products = Product::all(); // Fetch all products from the database
              $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
        return view('Front.productDetails', compact('product','products', 'totalCartItems'));
   }



    public function blog(){
                 $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
        return view("Front.blog" , compact( 'totalCartItems'));
    }

    public function blogDetails(){
                $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        };
        return view("Front.blogDetails"  , compact( 'totalCartItems'));
    }

    public function discounts(){
               $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
        return view("Front.discounts" , 'totalCartItems');
    }

    public function faq(){
                $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
        return view("Front.faq" , compact( 'totalCartItems'));
    }

    public function terms(){
                $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
        return view("Front.terms"  , compact( 'totalCartItems'));
    }

    public function policy(){
                 $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
        return view("Front.policy"  , compact( 'totalCartItems'));
    }

    public function returnFund(){
                 $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
        return view("Front.returnFund"  , compact( 'totalCartItems'));
    }

    public function squatchDifference(){
                 $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
        return view("Front.squatchDifference"  , compact( 'totalCartItems'));
    }

    public function cart(){
               $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
       $cartItems = Cart::where('user_id', auth()->id())->get();

    return view('Front.cart', compact('cartItems', 'totalCartItems'));
    }


    public function addToCart(Request $request)
{
    // Check if user is logged in
    if (!auth()->check()) {
        return redirect()->route('login')->with('message', 'Please log in to add products to your cart.');
    }

    $cartItem = Cart::where('user_id', auth()->id())
                ->where('product_id', $request->product_id)
                ->first();

    // If the product is already in the cart, increase the quantity
    if ($cartItem) {
        $cartItem->quantity += $request->quantity;
        $cartItem->save();
    } else {
        // If the product is not in the cart, create a new entry
        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);
    }

    return redirect()->back()->with('message', 'Product added to cart successfully.');
}


public function updateCart(Request $request, $id)
{
    $cartItem = Cart::findOrFail($id);
    $cartItem->quantity = $request->quantity;
    $cartItem->save();

    return redirect()->back()->with('success', 'Cart updated successfully!');
}

public function removeCart($id)
{
    $cartItem = Cart::findOrFail($id);
    $cartItem->delete();

    return redirect()->back()->with('success', 'Item removed from cart!');
}




public function checkout()
{
      $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
    
     $cartItems = Cart::where('user_id', auth()->id())->get();
    $subTotal = $cartItems->sum(function($item) {
        return $item->product->price * $item->quantity;
    });
    

    // Get discount from session
    $discount = session()->get('discount', 0); // 0 if no discount is applied
    $total = $subTotal - $discount;

    return view('Front.checkout', compact('cartItems','totalCartItems', 'subTotal', 'total', 'discount'));
}


public function applyCoupon(Request $request)
{
    // Validate the coupon code
    $coupon = Coupon::where('code', $request->coupon_code)->first();

    if (!$coupon) {
        return redirect()->back()->with('coupon_error', 'Invalid coupon code');
    }

    // Calculate discount (assuming percentage discount)
    $cartItems = Cart::where('user_id', auth()->id())->get();
    $subTotal = $cartItems->sum(function($item) {
        return $item->product->price * $item->quantity;
    });

    $discount = ($subTotal * $coupon->discount) / 100;

    // Store discount in session for later use
    session()->put('discount', $discount);

    return redirect()->back()->with('success', 'Coupon applied successfully!');
}



//====================================
// orders
public function placeOrder(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
    ]);

    $cartItems = Cart::where('user_id', auth()->id())->get();
    $subTotal = $cartItems->sum(function($item) {
        return $item->product->price * $item->quantity;
    });

    $discount = session()->get('discount', 0);
    $total = $subTotal - $discount;

    // Save order to database
    $order = new Order();
    $order->user_id = auth()->id();
    $order->name = $request->name;
    $order->email = $request->email;
    $order->phone = $request->phone;
    $order->address = $request->address;
    $order->subtotal = $subTotal;
    $order->discount = $discount;
    $order->total = $total;
    $order->save();

    // Save cart items as order items
    foreach ($cartItems as $item) {
        $orderItem = new OrderItem();
        $orderItem->order_id = $order->id;
        $orderItem->product_id = $item->product->id;
        $orderItem->quantity = $item->quantity;
        $orderItem->price = $item->product->price;
        $orderItem->save();
    }

    // Clear cart after placing order
    Cart::where('user_id', auth()->id())->delete();
    session()->forget('discount');

    // return redirect()->route('order.success')->with('success', 'Order placed successfully!');
    return redirect()->back()->with('success', 'Order placed successfully!');
}

//====================================


    public function dashboard(){
                 $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }

        return view("Front.dashboard"  , compact( 'totalCartItems'));
    }

    public function thanks(){
              $totalCartItems = 0; // Default to 0 for non-logged-in users

        if (Auth::check()) {
            $userId = Auth::id();
            // Fetch cart items count for the logged-in user
            $totalCartItems = Cart::where('user_id', $userId)->count();
        }
        return view("Front.thanks"  , compact( 'totalCartItems'));
    }
}
