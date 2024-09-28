<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\BlogPost;
use App\Models\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch counts
        $totalUsers = User::count();
        $totalOrders = Order::count();
        $totalBlogPosts = BlogPost::count();
        $totalProducts = Product::count();

       // Pass data to the view
        return view('Admin/home', [
            'totalUsers' => $totalUsers,
            'totalOrders' => $totalOrders,
            'totalBlogPosts' => $totalBlogPosts,
            'totalProducts' => $totalProducts,
        ]);
    }
}
