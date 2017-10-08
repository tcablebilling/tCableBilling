<?php

namespace TCableBilling\Http\Controllers;

use Illuminate\Http\Request;

use TCableBilling\Http\Models\Area;

/**
 * Class AreasController
 *
 * @package TCableBilling\Http\Controllers
 */
class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view('areas.all', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Area::create($request->all());
        \Alert::success(
        	'Your requested area has been created.',
	        'Area Created !'
        );
        return redirect('/areas');
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
        $area = Area::findOrFail($id);
        return view('areas.edit', compact('area'));
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
        $area = Area::findOrFail($id);
        $area->fill(\Input::all());
        $area->save();
        \Alert::success(
        	'Your requested area has been updated.',
	        'Area Updated !'
        );
        return \Redirect::to('/areas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();
        \Alert::info(
        	'Your requested area has been deleted.',
	        'Area Deleted !'
        );
        return \Redirect::to('/areas');
    }
}
