<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = __('site.users');

        /**
         * first get all admins (has role admin)
         * then on this result, when request has a search value perform search
         */
        $users = User::whereRoleIs('admin')->where(function ($q) use ($request) {
            $q->when($request->search, function ($query) use ($request) {
                $query->where('first_name', 'like', '%'. $request->search . '%')
                      ->orWhere('last_name', 'like', '%' . $request->search . '%');
            });

        })->paginate(5);
        return view('dashboard.users.index', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('site.add');
        return view('dashboard.users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating
        $request->validate([
                'first_name'    => 'required|string|min:3|max:12',
                'last_name'     => 'required|string|min:3|max:12',
                'email'         => 'required|email|unique:users',
                'password'      => 'required|min:6|max:20'
        ]);

        $validated = $request->except(['password', 'permissions']);

        // hashing password
        $validated['password'] = bcrypt($request->password);

        // saving
        $user = User::create($validated);

        // adding admin role
        $user->attachRole('admin');

        // appending permissions
        $user->syncPermissions($request->permissions);

        // checking
        if ($user) {
            return redirect()->route('dashboard.users.index')->with([
                'alertMessage'  => __('site.success_adding'),
                'alertType'     => 'success'
            ]);
        }

        return redirect()->route('dashboard.users.index')->with([
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
        $user = User::find($id);

        return view('dashboard.users.edit', compact('title', 'user'));
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
        $user = User::find($id);

        // validation
        $validated = $request->validate([
            'first_name'    => 'required|string|min:3|max:12',
            'last_name'     => 'required|string|min:3|max:12',
            'email'         => 'required|email|unique:users,email'.$id,
            'password'      => 'sometimes|nullable|min:6'
        ]);


        // update
        if ($request->password == '') {
            $updated = $user->update($request->except(['_token', '_method', 'password']));
        }else {
            $validated['password'] = bcrypt($validated['password']);
            $updated = $user->update($validated);
        }

        // syncronizing permissions
        $user->syncPermissions($request->permissions);

        // check if updated successfully
        if ($updated)
            return redirect(route('dashboard.users.index'))->with([
                'alertMessage'  => __('site.success_updating'),
                'alertType'     => 'success'
            ]);

        //  otherwise
        return redirect(route('dashboard.users.index'))->with([
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
        $user = User::find($id);
        // deleting
        $deleted = $user->delete();

        // check if deleted
        // check if updated successfully
        if ($deleted)
            return redirect(route('dashboard.users.index'))->with([
                'alertMessage'  => __('site.success_deleting'),
                'alertType'     => 'success'
            ]);

        else
            return redirect(route('dashboard.users.index'))->with([
                'alertMessage'  => 'site.error_adding',
                'alertType'     => 'error'
            ]);

    }
}
