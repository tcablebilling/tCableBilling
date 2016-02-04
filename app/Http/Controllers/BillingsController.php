<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Client;
use App\Billing;

class BillingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $billings = Billing::orderBy('id', 'DESC')->get();
            return json_encode($billings);
        }
        $billings = Billing::orderBy('id', 'DESC')->paginate(150);
        return view('billings', compact('billings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \Redirect::to('billings');
        // echo date("Ym", strtotime("+1 month", strtotime('2016-12-03')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Billing $billing)
    {
        $clients = Client::all();
        $data = array();
        $created_at = \DB::table('billings')->orderBy('created_at', 'desc')->first();
        $date = 0;
        if ($created_at) {
            $date = date( 'Ym', strtotime($created_at->created_at));
        }

        if ( date( 'Ym' ) != $date ) {
            foreach ($clients as $client) {
                $package = \DB::table('packages')->where('id', '=', $client->channel_package)->get();

                $data = array(
                    'client_id' =>  $client->id,
                    'bill_amount'   =>  $package[0]->fee,
                    'month' =>  date('Y-m-d', strtotime("+1 month", strtotime(date('Y-m-d'))))
                );

                $billing->create($data);
            }
        }


        return \Redirect::to('billings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \Redirect::to('billings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return \Redirect::to('billings');
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
        return \Redirect::to('billings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
