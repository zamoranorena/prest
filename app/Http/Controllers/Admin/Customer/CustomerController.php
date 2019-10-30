<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Company;
use App\Events\CreateToken;
use App\Http\Requests\Admin\Customer\CreateRequest;
use App\Http\Requests\Admin\Customer\UpdateRequest;
use App\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::with('company')->orderBy('created_at','desc')->paginate('10');
        return view("admin.customer.index")->with(['customers' => $customers]);
    }

    public function create(){
        $companies = Company::all();
        $positions = Position::all();
    	return view('admin.customer.create')->with(['companies' => $companies,'positions' => $positions]);
    }

    public function store(CreateRequest $request){
        $customer=new Customer();
        $customer->create($request->all());
        session()->flash('message','El cliente ha sido registrado correctamente');
        return redirect()->route('admin.customer');
    }

    public function edit(Request $request , $token){
        $companies = Company::all();
        $positions = Position::all();
        $customer = Customer::with('position','company')->findByToken($token);
        if($customer){
            if($request->ajax()){
                $data = view('admin.customer.includes.destroy-confirmation')->with(['customer' => $customer]);
                return $data;
            }else{
                return view('admin.customer.edit')->with(['customer' => $customer,'companies' => $companies,'positions' => $positions]);
            }
        }
    }

    public function update($token,UpdateRequest $request){
        $customer = Customer::with('position','company')->findByToken($token);
        $customer->update($request->all());
        session()->flash('message','El cliente ha sido actualizado correctamente');
        return redirect()->route('admin.customer');
    }

    public function show($token){
        $customer = Customer::findByToken($token);
        return view('admin.customer.show')->with(['customer' => $customer]);
    }

    public function destroy($token){
        $customer = Customer::findByToken($token);
        $customer->delete();
        session()->flash('message','El cliente ha sido eliminado correctamente');
        return redirect()->route('admin.customer');
    }
}
