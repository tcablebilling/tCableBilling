<?php

namespace TCableBilling\Http\Controllers;

use Illuminate\Http\Request;

use TCableBilling\Http\Models\Client;
use TCableBilling\Http\Models\Package;
use TCableBilling\Http\Models\Area;

/**
 * Class ClientsController
 *
 * @package TCableBilling\Http\Controllers
 */
class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('area_name', 'package')
                         ->paginate(150);
        return view('clients.all', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        /*
         * Getting all package names and ids in one array
         */
        $packages = Package::all();
        $package_names = [];
        foreach ($packages as $package) {
            $package_names[$package->id] = $package->name;
        }
        /*
         * Getting all area names and ids in one array
         */
        $areas = Area::all();
        $max_id = Client::max('id') + 1;
        $area_names = [];
        $area_codes = [];
        foreach ($areas as $area) {
            $area_names[$area->id] = $area->name;
        }
        foreach ($areas as $area) {
            $area_codes[$area->id] = $area->code
                                     . '-' . sprintf("%'.03d", $max_id);
        }
        $area_codes = json_encode($area_codes);
        return view(
        	'clients.create',
	        compact( 'package_names', 'area_names', 'area_codes' )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Client $client, Request $request)
    {
        $client->create($request->all());
        \Alert::success(
        	'Your requested client has been created.',
	        'Client Created !'
        );
        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
         * Getting all package names and ids in one array
         */
        $packages = Package::all();
        $package_names = [];
        foreach ($packages as $package) {
            $package_names[$package->id] = $package->name;
        }
        /*
         * Getting all area names and ids in one array
         */
        $areas = Area::all();
        $area_names = [];
        foreach ($areas as $area) {
            $area_names[$area->id] = $area->name;
        }


        $client = Client::findOrFail($id);
        return view(
        	'clients.edit',
	        compact('client', 'package_names', 'area_names')
        );
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
        $client = Client::findOrFail($id);
        $client->fill(\Input::all());
        $client->save();
        \Alert::success(
        	'Your requested client info has been updated.',
	        'Client Info Updated !'
        );
        return \Redirect::to('/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
		$client->delete();
        \Alert::info(
        	'Your requested client has been deleted.',
	        'Client Deleted !'
        );
        return \Redirect::to('/clients');
    }
}
