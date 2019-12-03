<?php

namespace App\Http\Controllers\Dashboard;

use App\Client;
use App\Http\Requests\ClientsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{

    // construct
    public function __construct()
    {
        $this->middleware(['permission:read_clients'])->only('index');
        $this->middleware(['permission:create_clients'])->only('create');
        $this->middleware(['permission:update_clients'])->only('edit');
    }

    // index
    public function index(Request $request)
    {
        $title = __('site.clients');

        $clients = Client::where(function($query) use ($request) {
            $query->when($request->search, function($q) use ($request) {
                $q->whereTranslationLike('name', '%' . $request->search . '%')
                ->orWhereTranslationLike('address', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        })
        ->latest()->paginate(5);

        return view('dashboard.clients.index', compact('title', 'clients'));
    }

    // create
    public function create()
    {
        $title = __('site.add');
        
        return view('dashboard.clients.create', compact('title'));
    }

    // store
    public function store(ClientsRequest $request)
    {
        // dd ($request->rules());
        $client = Client::create($request->all());

        // checking
        if ($client) {
            return redirect()->route('dashboard.clients.index')->with([
                'alertMessage'  => __('site.success_adding'),
                'alertType'     => 'success'
            ]);
        }

        return redirect()->route('dashboard.clients.index')->with([
            'alertMessage'  => __('site.error_adding'),
            'alertType'     => 'error'
        ]);

    }

    // edit
    public function edit($id)
    {
        $title = __('site.update');

        $client = Client::find($id);

        if ($client)
            return view('dashboard.clients.edit', compact('title', 'client'));

        return abort(404);
    }


    // update
    public function update(ClientsRequest $request, $id)
    {

        $client = Client::find($id);

        // saving
        $updated = $client->update($request->all());

        // checking
        if ($updated) {
            return redirect()->route('dashboard.clients.index')->with([
                'alertMessage'  => __('site.success_updating'),
                'alertType'     => 'success'
            ]);
        }

        return redirect()->route('dashboard.clients.index')->with([
            'alertMessage'  => __('site.success_updating'),
            'alertType'     => 'error'
        ]);

    }

    // destroy
    public function destroy($id)
    {
        $client = Client::find($id);

        // deleting
        $deleted = $client->delete();

        // check if deleted
        if ($deleted)
            return redirect(route('dashboard.clients.index'))->with([
                'alertMessage'  => __('site.success_deleting'),
                'alertType'     => 'success'
            ]);

        return redirect(route('dashboard.clients.index'))->with([
            'alertMessage'  => 'site.error_adding',
            'alertType'     => 'error'
        ]);
    }
}
