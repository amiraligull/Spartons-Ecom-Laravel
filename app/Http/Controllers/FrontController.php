<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view("Front.index");
    }

    public function contact(){
        return view("Front.contact");
    }

    public function shop(){
        return view("Front.shop");

    }

    public function productDetails(){
        return view("Front.productDetails");
    }

    public function blog(){
        return view("Front.blog");
    }

    public function blogDetails(){
        return view("Front.blogDetails");
    }

    public function discounts(){
        return view("Front.discounts");
    }

    public function faq(){
        return view("Front.faq");
    }

    public function terms(){
        return view("Front.terms");
    }

    public function policy(){
        return view("Front.policy");
    }

    public function returnFund(){
        return view("Front.returnFund");
    }

    public function squatchDifference(){
        return view("Front.squatchDifference");
    }

    public function cart(){
        return view("Front.cart");
    }

    public function checkout(){
        return view("Front.checkout");
    }

    public function dashboard(){
        return view("Front.dashboard");
    }

    public function thanks(){
        return view("Front.thanks");
    }
}
