<?php

namespace TCableBilling\Http\Controllers;

use Illuminate\Http\Request;

use TCableBilling\Http\Models\Package;

/**
 * Class PackagesController
 *
 * @package TCableBilling\Http\Controllers
 */
class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('packages.all', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Package $package, Request $request)
    {
        $package->create($request->all());
        \Alert::success(
        	'Your requested package has been created.',
	        'Package Created !'
        );
        return redirect('/packages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('packages.edit', compact('package'));
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
        $package = Package::findOrFail($id);
        $package->fill(\Input::all());
        $package->save();
        \Alert::success(
        	'Your requested package info has been updated.',
	        'Package Updated !'
        );
        return \Redirect::to('/packages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        \Alert::info(
        	'Your requested package has been deleted.',
	        'Package Deleted !'
        );
        return \Redirect::to('/packages');
    }
}
