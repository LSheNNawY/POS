<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use  Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_categories'])->only('index');
        $this->middleware(['permission:create_categories'])->only('create');
        $this->middleware(['permission:update_categories'])->only('edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = __('site.categories');

        /**
         * first get all admins (has role admin)
         * then on this result, when request has a search value perform search
         */
        $categories = Category::when($request->search, function ($query) use ($request) {
                $query->whereTranslationLike('name', '%'. $request->search . '%');
        })->latest()->paginate(5);

        return view('dashboard.categories.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('site.add');
        return view('dashboard.categories.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) 
        {
           $rules += [
                $locale . '.name' => [
                    'required', 'string', 'min:3', 'max:20',
                    Rule::unique('category_translations', 'name')
                ]
            ];
        }
        // validate
        $request->validate($rules);

        // saving
        $category = Category::create($request->all());

        // checking
        if ($category) {
            return redirect()->route('dashboard.categories.index')->with([
                'alertMessage'  => __('site.success_adding'),
                'alertType'     => 'success'
            ]);
        }

        return redirect()->route('dashboard.categories.index')->with([
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
        $category = Category::find($id);
        // check if category exists
        if ($category)
            return view('dashboard.categories.edit', compact('title', 'category'));

        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $rules = [];

        foreach (config('translatable.locales') as $locale) 
        {
           $rules += [
                $locale . '.name' => [
                    'required', 'string', 'min:3', 'max:20',
                    Rule::unique('category_translations', 'name')->ignore($category->id, 'category_id')
                ]
            ];
        }
        // validate
        $request->validate($rules);

        // update
        $updated = $category->update($request->all());

        // check if updated successfully
        if ($updated)
            return redirect(route('dashboard.categories.index'))->with([
                'alertMessage'  => __('site.success_updating'),
                'alertType'     => 'success'
            ]);

        //  otherwise
        return redirect(route('dashboard.categories.index'))->with([
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
        $category = Category::find($id);
        // deleting
        $deleted = $category->delete();

        // check if deleted
        if ($deleted)
            return redirect(route('dashboard.categories.index'))->with([
                'alertMessage'  => __('site.success_deleting'),
                'alertType'     => 'success'
            ]);

        return redirect(route('dashboard.categories.index'))->with([
            'alertMessage'  => 'site.error_adding',
            'alertType'     => 'error'
        ]);

    }
}
