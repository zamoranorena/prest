<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Loan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(){

    }

    public function create(){
        $loans = Loan::all();
        return view('admin.payment.create')->with(['loans' => $loans]);
    }
}
