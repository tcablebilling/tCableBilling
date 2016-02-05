<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Client;
use App\Billing;

class BillingsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$billings = Billing::orderBy( 'id', 'DESC' )->paginate( 150 );
		$client_id = null;
		$clients   = [ ];
		foreach ( Client::all() as $client ) {
			$clients[ $client->id ] = $client->client_id . ' ' . $client->name;
		}
		$client_id = \Input::get( 'client_id' );
		if ( $client_id != null ) {
			$billings = Billing::where( 'client_id', $client_id )->orderBy( 'id', 'DESC' )->paginate( 150 );
			return view( 'billings', compact( 'billings', 'client_id', 'clients' ) );
		}
		return view( 'billings', compact( 'billings', 'client_id', 'clients' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return \Redirect::to( 'billings' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Billing $billing ) {
		$clients = Client::all();
		$data = array();
		$created_at = \DB::table( 'billings' )->orderBy( 'created_at', 'desc' )->first();
		$date = 0;
		if ( $created_at ) {
			$date = date( 'Ym', strtotime( $created_at->created_at ) );
		}
		if ( date( 'Ym' ) != $date ) {
			foreach ( $clients as $client ) {
				$package = \DB::table( 'packages' )->where( 'id', '=', $client->channel_package )->get();
				$data = array(
					'client_id'   => $client->id,
					'bill_amount' => $package[0]->fee,
					'month'       => date( 'Y-m-d', strtotime( "+1 month", strtotime( date( 'Y-m-d' ) ) ) )
				);
				$billing->create( $data );
			}
		}
		return \Redirect::to( 'billings' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		return \Redirect::to( 'billings' );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		return \Redirect::to( 'billings' );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		return \Redirect::to( 'billings' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
	}

	public function individualClient()
	{
		return view('individual_bill');
	}
}
