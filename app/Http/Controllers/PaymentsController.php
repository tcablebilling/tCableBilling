<?php

namespace TCableBilling\Http\Controllers;

use Illuminate\Http\Request;

use TCableBilling\Http\Models\Payment;
use TCableBilling\Http\Models\Client;
use TCableBilling\Http\Models\Billing;

/**
 * Class PaymentsController
 *
 * @package TCableBilling\Http\Controllers
 */
class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::with('clientDetails')
                           ->orderBy('id', 'DESC')
                           ->paginate(150);

        $client_id = null;
        $clients = [];

        foreach ( Client::all() as $client) {
            $clients[$client->id] = $client->area_name->code
                                    . '-' . sprintf(
                                    	"%'.03d\n",
	                                    $client->id
	                                ) . ' ' . $client->name;
        }

        $client_id = \Input::get('client_id');

        if ( $client_id != null ) {
            $payments = Payment::where('client_id', $client_id)
                               ->orderBy('id', 'DESC')
                               ->paginate(150);
            return view(
            	'payments.all',
	            compact('payments', 'client_id', 'clients')
            );
        }


        return view(
        	'payments.all',
	        compact( 'payments', 'client_id', 'clients' )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = [];
        foreach ( Client::all() as $client) {
            $clients[$client->id] = $client->area_name->code
                                    . '-' . sprintf(
                                    	"%'.03d\n",
	                                    $client->id
	                                ) . ' ' . $client->name;
        }
        $billings = [];
        foreach ( Billing::all() as $billing) {
            $billings[$billing->id] = sprintf("%'.05d\n", $billing->id);
        }
        return view(
        	'payments.create',
	        compact('clients', 'billings')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Payment::create( $request->all() );
        \Alert::success(
        	'Your requested payment has been created.',
	        'Payment Created !'
        );
        return \Redirect::to( 'payments' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \Redirect::to( 'payments' );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = [];
        foreach ( Client::all() as $client) {
            $clients[$client->id] = $client->area_name->code
                                    . '-' . sprintf(
                                    	"%'.03d\n",
	                                    $client->id
	                                ) . ' ' . $client->name;
        }
        $payment = Payment::findOrFail($id);
        $billings = [];
        foreach ( Billing::all() as $billing) {
            $billings[$billing->id] = sprintf("%'.05d\n", $billing->id);
        }
        return view(
        	'payments.edit',
	        compact('payment', 'clients', 'billings')
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
        $payment = Payment::findOrFail($id);
        $payment->fill(\Input::all());
        $payment->save();
        \Alert::success(
        	'Your requested payment has been updated.',
	        'Payment Updated !'
        );
        return \Redirect::to('/payments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        \Alert::info(
        	'Your requested payment has been deleted.',
	        'Payment Deleted !'
        );
        return \Redirect::to('/payments');
    }
}
