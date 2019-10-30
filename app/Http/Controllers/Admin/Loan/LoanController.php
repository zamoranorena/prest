<?php

namespace App\Http\Controllers\Admin\Loan;

use App\Customer;
use App\Http\Requests\Admin\Loan\CreateRequest;
use App\Loan;
use App\Percentaje;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function index(){
        $loans = Loan::with('customer')->orderBy('created_at','desc')->get();
        foreach ($loans as $loan){
            $paid_amount = DB::table('loans')
                ->join('payments','loans.id', '=' ,'payments.loan_id')
                ->select(DB::raw('SUM(payments.amount) as paid_amount, loans.amount as total_amount'))
                ->groupBy('total_amount')
                ->where('loans.id',$loan->id)
                ->get();
            if($paid_amount->pluck('paid_amount')->first() < $loan->amount){
                $loan->payment = "no pagado";
            }elseif ($paid_amount->pluck('paid_amount')->first() == $loan->amount){
                $loan->payment = "pagado";
            }elseif($paid_amount->pluck('paid_amount')->first() > $loan->amount){
                $loan->payment = "pago exceso";
            }
        }
        return view("admin.loan.index")->with(['loans' => $loans]);
    }

    public function create(){
        $percentajes = Percentaje::all();
        $customers = Customer::all();
        return view('admin.loan.create')->with(['percentajes' => $percentajes, 'customers' => $customers]);
    }

    public function store(CreateRequest $request){
        $loan=new Loan();
        $loan->amount = $request->amount;
        $loan->percentaje_id = $request->percentaje_id;
        $loan->amount_payable = floatval($request->amount) + (floatval($request->amount) * (floatval($request->percentaje_value)/100));
        $loan->customer_id = $request->customer_id;
        $loan->save();
        session()->flash('message','El préstamo ha sido registrado correctamente');
        return redirect()->route('admin.loan');
    }

    public function loanCustomer(Request $request, $id){
        $loans = DB::table('loans')
            ->where('loans.customer_id',$id)
            ->get();
        $unpainds_loans=[]; // Prestamos no pagados
        if(count($loans) > 0){
            foreach ($loans as $loan){
                $paid_amount = DB::table('loans')
                    ->join('payments','loans.id', '=' ,'payments.loan_id')
                    ->select(DB::raw('SUM(payments.amount) as paid_amount, loans.amount as total_amount'))
                    ->groupBy('total_amount')
                    ->where('loans.id',$loan->id)
                    ->get();
                    if($paid_amount->pluck('paid_amount')->first() < $loan->amount){
                        $unpainds_loans[] = $paid_amount;
                    }
            }
            return response()
                ->json(['unpainds_loans' => $unpainds_loans])
                ->setCallback($request->input('callback'));
        }else{
            return response()
                ->json(['unpainds_loans' => $unpainds_loans])
                ->setCallback($request->input('callback'));
        }
    }
}
