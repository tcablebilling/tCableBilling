<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Client;
use App\Package;
use App\Area;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
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
        $area_names = [];
        foreach ($areas as $area) {
            $area_names[$area->id] = $area->name;
        }

        return view('clients.create', compact('package_names', 'area_names'));
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
        return view('clients.create');
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
        return view('clients.edit', compact('client', 'package_names', 'area_names'));
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

        return \Redirect::to('/clients');
    }
}
