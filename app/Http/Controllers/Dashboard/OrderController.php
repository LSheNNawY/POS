<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Order;
use App\Product;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        return back()->with([
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
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
