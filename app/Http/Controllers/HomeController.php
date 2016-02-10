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
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::check() ) {
            return view('home');
        }

        return Redirect::to('/');
    }
    public function billMonthly()
    {
        // $date = strtotime('+1 month', strtotime(date('Ym').'01'));
        $date = strtotime(\Input::get('range'));
        $billings = Billing::where('month', '=', date('Ymd', $date))->get();
        // $pdf = PDF::loadView('invoices.monthly', compact('billings'));
        // return $pdf->download('invoice.pdf');
        return view('invoices.monthly', compact('billings'));
    }
}
