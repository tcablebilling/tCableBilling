<?php

namespace TCableBilling\Http\Controllers;

use Illuminate\Http\Request;

use TCableBilling\Http\Models\Client;
use TCableBilling\Http\Models\Billing;

/**
 * Class BillingsController
 *
 * @package TCableBilling\Http\Controllers
 */
class BillingsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$billings = Billing::with(
			'billCumulative',
			'paidCumulative',
			'clientDetails',
			'clientPayments'
		);
		
		$client_id = null;
		$clients   = [ ];
		foreach ( Client::all() as $client ) {
			$clients[ $client->id ] = $client->area_name->code
									. '-' . sprintf(
									"%'.03d\n",
										$client->id
									). ' ' . $client->name;
		}
		$client_id = \Input::get( 'client_id' );
		if ( $client_id != null ) {
			$billings =$billings->where( 'client_id', $client_id );
		}
		$billings = $billings->orderBy('id','desc')
		                     ->paginate(159);
		return view(
			'billings',
			compact( 'billings', 'client_id', 'clients' )
		);
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
		$clients = Client::where('client_status', '=', 'Active')->get();
		$data = array();
		$created_at =   \DB::table( 'billings' )
						->orderBy( 'created_at', 'desc' )
						->first();
		$date = 0;
		if ( $created_at ) {
			$date = date( 'Ym', strtotime( $created_at->created_at ) );
		}
		if ( date( 'Ym' ) != $date ) {
			foreach ( $clients as $client ) {
				$package =    \DB::table( 'packages' )
				              ->where( 'id', '=', $client->package_id )
				              ->get();
				$data = array(
					'client_id'   => $client->id,
					'bill_amount' => $package[0]->fee,
					'month'       => date(
						'Ymd',
						strtotime(
							"+1 month",
							strtotime( date( 'Ym' ).'01' )
						)
					)
				);
				$billing->create( $data );
			}
		}

		if ( env('DB_CONNECTION') == 'sqlite' ) {
			$database = storage_path('database.sqlite');
			$backup_database = env( 'DB_BACKUP_DIR', storage_path() )
			                   . date( 'Y-m-d-H-i-s' )
			                   . '_datatbase.sqlite';
			copy($database, $backup_database);
		}

        \Alert::success(
        	'Monthly bill for all clients has been generated.<br/>
			Monthly database backup also completed.',
	        'Bill & Backup Done!'
        )->html('true')->persistent('Close');
		return \Redirect::to( 'home' );
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
        $billing = Billing::findOrFail($id);
        $billing->delete();
        \Alert::info(
        	'Your requested bill has been deleted.',
	        'Bill Deleted !'
        );
        return \Redirect::to('/billings');
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function individualClient()
	{
		$input = explode('-', \Input::get( 'range' ), 2);
		$input_fm = null;
		$input_tm = null;
		if (!empty($input)) {
			$input_fm = $input[0];
			if (array_key_exists( 1, $input)) {
				$input_tm = $input[1];
			}
		}
		$from_month = date('Ym', strtotime( $input_fm ));
		$to_month = date(
			'Ymd',
			strtotime(
				date( 'Y-m-d', strtotime( $input_tm ) )
			)
		);
		$client_id = null;
		$clients   = [ ];
		foreach ( Client::all() as $client ) {
			$clients[ $client->id ] = $client->area_name
				                            ->code . '-' . sprintf(
											    "%'.03d\n",
											    $client->id
											) . ' ' . $client->name;
		}
		$client_id = \Input::get( 'client_id' );
		$billings = Billing::with('billCumulative', 'paidCumulative');
		$billings = $billings
			->where( 'client_id', $client_id )
			->orderBy( 'id', 'DESC' )
			->whereBetween('month', array( $from_month, $to_month))
			->paginate( 150 );
		return view(
			'individual_bill',
			compact(
				'billings',
				'client_id',
				'clients',
				'input_fm',
				'input_tm'
			)
		);
	}
}
