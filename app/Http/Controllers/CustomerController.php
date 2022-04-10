<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function register()
    {
        return view('customer.register');
    }
    public function login()
    {
        return view('customer.login');
    }
    public function dashboard(Request $request)
    {
        if($customerId = $request->session()->get('customer_id')){
            $customer = Customer::query()->find($customerId);
            if($customer){
                return view('customer.dashboard', compact('customer'));
            }
        }else{
            //error
            return view('customer.login');
        }
    }
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $customer = Customer::query()
            ->where('email', '=', $request->email)
            //->where('password', '=', Hash::check($request->password))
            ->first();
        if($customer && Hash::check($request->password, $customer->password)){
            $request->session()->put('customer_id' , $customer->id);
            return redirect()->route('customer.dashboard');
        }else{
            // error password incorrect or account doesnt exist
            return redirect()->route('customer.login');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->remove('customer_id');
        return redirect()->route('customer.login');
    }
    public function create(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|confirmed',
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $customer = new Customer($data);
        $customer->save();
        return redirect()->route('customer.login');

    }
}
