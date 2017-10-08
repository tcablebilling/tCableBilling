<?php

namespace TCableBilling\Http\Controllers;

use TCableBilling\Http\Models\Client;
use TCableBilling\Http\Models\Billing;
use TCableBilling\Http\Models\Payment;
use TCableBilling\Http\Models\Employee;

/**
 * Class HomeController
 *
 * @package TCableBilling\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    	$clients   = [ ];
        $client_count = Client::count();

        $next_mon_bill = Billing::where(
        	'month','=',
	        date( 'Ymd',
	              strtotime(
	              	"+1 month",
	                strtotime(
	                	date( 'Ym' ).'01'
	                )
	              )
	        )
        )->with('clientDetails', 'clientPayments')->sum('bill_amount');

        $this_mon_bill = Billing::where(
        	'month',
	        '=',
	        date( 'Ym').'01'
        )
        ->with('clientDetails', 'clientPayments')
        ->sum('bill_amount');

        $this_mon_payment = Payment::whereYear(
        	'date',
	        '=',
	        date( 'Y')
        )
        ->whereMonth('date','=', date('m'))
        ->sum('paid_amount');

        $employee_salary = Employee::all()->sum('salary');

        foreach ( Client::all() as $client ) {
            $clients[$client->id] = $client->area_name->code .
								'-' . sprintf("%'.03d\n", $client->id) .
								' ' . $client->name;
        }

        $button = Billing::orderBy( 'created_at', 'DESC' )->first();

        $b = date('Ym', strtotime($button['created_at']));

        return view('home', compact(
        	'clients',
        	'b',
        	'client_count',
        	'next_mon_bill',
        	'this_mon_bill',
        	'this_mon_payment',
            'employee_salary'
        	)
        );

    }
	
	/**
	 * @return mixed
	 */
    public function billMonthly()
    {
        // $date = strtotime('+1 month', strtotime(date('Ym').'01'));
        $date = strtotime(\Input::get('range'));

        $billings = Billing::with(
        	'billCumulative',
	        'paidCumulative'
        )
        ->where('month', '=', date('Ymd', $date))
        ->get();

        $pdf = \PDF::loadView('invoices.monthly', compact('billings'));

        return $pdf->download(date('Y-m-d').'.pdf');
        //return view('invoices.monthly', compact('billings'));
    }
	
	/**
	 * @return mixed
	 */
    public function clientCustom()
    {
        $input = explode('-', \Input::get( 'month_range' ), 2);

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
	        	date(
	        		'Y-m-d',
			        strtotime( $input_tm )
		        )
	        )
        );

        $client_id = null;

        $clients   = [ ];

        foreach ( Client::all() as $client ) {
            $clients[ $client->id ] = $client->area_name->code .
					'-' . sprintf("%'.03d\n", $client->id) .
					' ' . $client->name;
        }

        $client_id = \Input::get( 'client_id' );

        $billings_all = Billing::with(
        	'billCumulative',
	        'paidCumulative'
        )
        ->where( 'client_id', $client_id )
        ->orderBy( 'id', 'DESC' )
        ->whereBetween('month', array( $from_month, $to_month))
        ->get();

        $billings = $billings_all->chunk(16);

        if (empty($billings[0])) {
            \Alert::error('No Data Found !')->persistent("Close");
            return \Redirect::to('home');
        }
        
	    $pdf = \PDF::loadView(
	    	'invoices.client',
		    compact(
		    	'billings',
			    'client_id',
			    'clients',
			    'input_fm',
			    'input_tm'
		    )
	    );

        $name = date('Y-m-d') . '-' . $client_id;

        return $pdf->download( $name . '.pdf' );
    }
	
	/**
	 * @return mixed
	 */
    public function dbBackup()
    {
        if (\Auth::user()->role != 'Admin')
            return \Redirect::to('home');
        $file = storage_path('database.sqlite');
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'
                   . basename($file) . '"'
            );
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function rootPath()
    {
        if( \Auth::check() )
            return \Redirect::to( 'home' );
        return view( 'welcome' );
    }
}
