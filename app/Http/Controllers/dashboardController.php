<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;


class dashboardController extends Controller
{
    public function index()
    {
        $products= new Product();
        $orders =new Order();
        $users = new User();
        return view('admin.dashboard',compact('products','users','orders'));
    }
}
