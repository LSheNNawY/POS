<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Order;
use App\Product;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_orders'])->only('index');
        $this->middleware(['permission:create_orders'])->only('create');
        $this->middleware(['permission:update_orders'])->only('edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $title = __('site.orders');
        // search orders by client name
        $orders = Order::whereHas('client', function($q) use($request){
            
            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.orders.index', compact('title', 'orders'));
    }
  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        $title = __('site.make_order');
        $categories = Category::with('products')->get();

        return view('dashboard.clients.orders.create', compact('title', 'categories', 'client'));
    }

    /**
     * @param Request $request
     * @param Client $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Client $client)
    {
        // adding new order function
        $this->attachOrder($request, $client);

        return redirect()->route('dashboard.orders.index')->with([
            'alertMessage'  => __('site.success_adding'),
            'alertType'     => 'success'
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Order $order)
    {
        if ($request->ajax()) {

            $title = __('site.order');
            $order = Order::with('products')->find($order)->first();

            if ($order)
                return view('dashboard.orders._showOrder', compact('title', 'order'));

            return response('Not found', 500);
        }

        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $title = __('site.edit_order');

        $categories = Category::with('products')->get();

        $products_ids = [];

        foreach ($order->products as $product) {

            $products_ids[] = $product->id;
        }

        return view('dashboard.orders.edit', compact('title', 'order', 'categories', 'products_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client, Order $order)
    {
        // removing old order first
        $this->detachOrder($order);
        // adding new order with new data
        $this->attachOrder($request, $client);

         return redirect()->route('dashboard.orders.index')->with([
            'alertMessage'  => __('site.success_updating'),
            'alertType'     => 'success'
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // detaching order function
        $deleted = $this->detachOrder($order);

         // check if deleted
        if ($deleted)
            return redirect(route('dashboard.orders.index'))->with([
                'alertMessage'  => __('site.success_deleting'),
                'alertType'     => 'success'
            ]);

        return redirect(route('dashboard.orders.index'))->with([
            'alertMessage'  => 'site.error_adding',
            'alertType'     => 'error'
        ]);
    }


    /**
     * [attachOrder description]
     * @param  Request $request 
     * @param  Client  $client  
     * @return [type]           
     */
    private function attachOrder($request, $client) {

        $products = $request->products;
        $total_price = 0;

        // creating new order
        $order = $client->orders()->create([]);

        // adding order products (using attach for many to many relationship)
        $order->products()->attach($request->products);


        // looping over products
        foreach ($products as $product_id => $quantity_array)
        {
            $product_quantity = $quantity_array['quantity'];

            // getting each product sale price
            $product = Product::findOrFail($product_id);
            $product_salae_price = $product->sale_price;

            // calculating total price for each product then adding to order total price
            $total_price += ($product_salae_price * $product_quantity);

            // updating each product stock
            $product->update(['stock' => ($product->stock - $product_quantity)]);
        }

        // updating order to add total price
        $order->update(['total_price'=> $total_price]);
    }


    /**
     * [detachOrder ]
     * @param  [type] $order 
     * @return [type]        
     */
    private function detachOrder($order) {
        
        // deleting
        $deleted = $order->delete();

        return $deleted;
    }
}
