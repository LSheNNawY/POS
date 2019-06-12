<?php

namespace App\Http\Controllers\Dashboard;

use App\helpers\IntervUpload;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use Storage;
use Image;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
    }


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

        })->latest()->paginate(5);
        return view('dashboard.users.index', compact('title', 'users'));
    }


    public function create()
    {
        $title = __('site.add');
        return view('dashboard.users.create', compact('title'));
    }


    public function store(UsersRequest $request)
    {
        $validated = $request->except(['password', 'permissions', 'image']);

        // hashing password
        $validated['password'] = bcrypt($request->password);

        // image manipulation and upload
        if ($request->image) {
            // upload image
            IntervUpload::upload($request->image, 'users');

            $validated['image'] = $request->image->hashName();
        }

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


    public function edit($id)
    {
        $title = __('site.update');
        $user = User::find($id);
        // check if user exists
        if ($user)
            return view('dashboard.users.edit', compact('title', 'user'));
        
        return abort(404);
    }


    public function update(UsersRequest $request, $id)
    {
        $user = User::find($id);

        $validated = $request->except(['_token', '_method', 'password', 'image']);

        // password
        if ($request->password != '') {
            $validated['password'] = bcrypt($request->password);
        }

        // image manipulation and upload
        if ($request->image) {
            // saving new image file
            $saved = IntervUpload::upload($request->image, 'users');

            // delete old image
            if ($saved) { 
                if ($user->image != 'default-user.jpg') {
                    Storage::disk('public_uploads')->delete('/users/' . $user->image);
                }
            }

            $validated['image'] = $request->image->hashName();
        }

        // update
        $updated = $user->update($validated);

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


    public function destroy($id)
    {
        $user = User::find($id);
        // deleting
        $deleted = $user->delete();
        // removing user image
        if ($user->image != 'default-user.jpg')
            Storage::disk('public_uploads')->delete('/users/' . $user->image);

        // check if deleted
        if ($deleted)
            return redirect(route('dashboard.users.index'))->with([
                'alertMessage'  => __('site.success_deleting'),
                'alertType'     => 'success'
            ]);

        return redirect(route('dashboard.users.index'))->with([
            'alertMessage'  => 'site.error_adding',
            'alertType'     => 'error'
        ]);

    }
}
