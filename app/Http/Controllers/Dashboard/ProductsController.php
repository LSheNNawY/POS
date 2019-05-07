<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use Illuminate\Http\Request;
use App\helpers\IntervUpload;
use App\Product;
use App\Category;
use Storage;


class ProductsController extends Controller
{
    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        $this->middleware(['permission:read_products'])->only('index');
        $this->middleware(['permission:create_products'])->only('create');
        $this->middleware(['permission:update_products'])->only('edit');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $title = __('site.products');

        $categories = Category::all();

        $products = Product::when($request->search, function ($query) use ($request) {
                $query->whereTranslationLike('name', '%' . $request->search . '%');
            })
            ->when($request->category_id, function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            })
            ->latest()->paginate(5);

        return view('dashboard.products.index', compact('title','categories', 'products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $title = __('site.create');

        $categories = Category::all();

        return view('dashboard.products.create', compact('title', 'categories'));
    }

    /**
     * @param ProductsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductsRequest $request)
    {
        $validated = $request->except(['image']);

        // image manipulation and upload
        if ($request->image) {
            // upload image
            IntervUpload::upload($request->image, 'products');

            $validated['image'] = $request->image->hashName();
        }

        // saving
        $product = Product::create($validated);

        // checking
        if ($product) {
            return redirect()->route('dashboard.products.index')->with([
                'alertMessage'  => __('site.success_adding'),
                'alertType'     => 'success'
            ]);
        }

        return redirect()->route('dashboard.products.index')->with([
            'alertMessage'  => __('site.error_adding'),
            'alertType'     => 'error'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = __('site.update');
        $categories = Category::all();
        $product = Product::find($id);
        // check if user exists
        if ($product)
            return view('dashboard.products.edit', compact('title', 'categories' ,'product'));

        return abort(404);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, $id)
    {
        $product = Product::find($id);

        $validated = $request->except(['image']);

        // image manipulation and upload
        if ($request->image) {
            // saving new image file
            $saved = IntervUpload::upload($request->image, 'products');

            // delete old image
            if ($saved) {
                if ($product->image != 'default-product.png') {
                    Storage::disk('public_uploads')->delete('/products/' . $product->image);
                }
            }

            $validated['image'] = $request->image->hashName();
        }

        // update
        $updated = $product->update($validated);

        // check if updated successfully
        if ($updated)
            return redirect(route('dashboard.products.index'))->with([
                'alertMessage'  => __('site.success_updating'),
                'alertType'     => 'success'
            ]);

        //  otherwise
        return redirect(route('dashboard.products.index'))->with([
            'alertMessage'  => __('site.error_adding'),
            'alertType'     => 'error'
        ]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        // deleting
        $deleted = $product->delete();

        // removing product image
        if ($product->image != 'default-product.png')
            Storage::disk('public_uploads')->delete('/products/' . $product->image);

        // check if deleted
        if ($deleted)
            return redirect(route('dashboard.products.index'))->with([
                'alertMessage'  => __('site.success_deleting'),
                'alertType'     => 'success'
            ]);

        return redirect(route('dashboard.products.index'))->with([
            'alertMessage'  => 'site.error_adding',
            'alertType'     => 'error'
        ]);

    }

}
