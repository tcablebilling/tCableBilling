<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Pulling in Auth & Redirect
use Auth;
use Redirect;
use PDF;
use App\Client;
use App\Billing;
use App\Payment;
use App\Employee;

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
        $next_mon_bill = Billing::where('month','=', date( 'Ymd', strtotime( "+1 month", strtotime( date( 'Ym' ).'01' ) ) ))->sum('bill_amount');
        $this_mon_bill = Billing::where('month','=', date( 'Ym').'01')->sum('bill_amount');
        $this_mon_payment = Payment::whereYear('date','=', date( 'Y'))->whereMonth('date','=', date('m'))->sum('paid_amount');
        $employee_salary = Employee::all()->sum('salary');
        foreach ( Client::all() as $client ) {
            $clients[ $client->id ] = $client->client_id . ' ' . $client->name;
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
    public function billMonthly()
    {
        // $date = strtotime('+1 month', strtotime(date('Ym').'01'));
        $date = strtotime(\Input::get('range'));
        $billings = Billing::where('month', '=', date('Ymd', $date))->get();
        $pdf = PDF::loadView('invoices.monthly', compact('billings'));
        return $pdf->download(date('Y-m-d').'.pdf');
        // return view('invoices.monthly', compact('billings'));
    }
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
        $to_month = date( 'Ymd', strtotime( date( 'Y-m-d', strtotime( $input_tm ) ) ) );
        $client_id = null;
        $clients   = [ ];
        foreach ( Client::all() as $client ) {
            $clients[ $client->id ] = $client->client_id . ' ' . $client->name;
        }
        $client_id = \Input::get( 'client_id' );
        $billings_all = Billing::where( 'client_id', $client_id )->orderBy( 'id', 'DESC' )->whereBetween('month', array( $from_month, $to_month))->get();
        $billings = $billings_all->chunk(14);
        // return view('invoices.client', compact( 'billings', 'client_id', 'clients', 'input_fm', 'input_tm' ));
        $pdf = PDF::loadView('invoices.client', compact( 'billings', 'client_id', 'clients', 'input_fm', 'input_tm' ));
        $name = date('Y-m-d') . '-' . $client_id;
        return $pdf->download( $name . '.pdf' );
    }

    public function rootPath()
    {
        if( Auth::check() )
            return Redirect::to( 'home' );
        else
            return view( 'welcome' );
    }
}
