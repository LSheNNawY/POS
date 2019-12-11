<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Category;
use App\Product;
use App\Order;
use DB;

class HomeController extends Controller
{
    public function index() 
    {
    	 $title = __('site.dashboard');
    	 $clients = Client::all();
    	 $categories = Category::all();
    	 $products = Product::all();
    	 $orders = Order::all();

/*    	
		//FOR MYSQL 
		// for chart
    	 $sales = Order::select(
    	 	DB::raw('YEAR(`created_at`) as year'),
    	 	DB::raw('MONTH(`created_at`) as month'),
    	 	DB::raw('SUM(`total_price`) as total_price'),
    	 )->groupBy('month')->get(); 
*/
    	 /**
    	  * FOR SQLITE
    	  * for chart
    	  */
    	 $sales = Order::select(
    	 	DB::raw("strftime('%Y',created_at) as year"),
    	 	DB::raw("strftime('%m',created_at) as month"),
    	 	DB::raw('SUM(`total_price`) as total_price'),
    	 )->groupBy('month')->get();


    	 return view('dashboard.index', compact('title', 'clients', 'categories', 'products','orders', 'sales'));
    }
}
