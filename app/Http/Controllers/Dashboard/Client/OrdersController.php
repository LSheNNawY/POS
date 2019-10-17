<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Order;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
