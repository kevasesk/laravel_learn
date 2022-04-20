<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function register()
    {
        return view('frontend.customer.register');
    }
    public function login()
    {
        return view('frontend.customer.login');
    }
    public function dashboard(Request $request)
    {
        if($customerId = $request->session()->get('customer_id')){
            $customer = Customer::query()->find($customerId);
            if($customer){
                return view('frontend.customer.dashboard', compact('customer'));
            }
        }else{
            //error
            return view('frontend.customer.login');
        }
    }
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'g-recaptcha-response' => ['required', new \App\Rules\Recaptcha]
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
        return redirect()->route('customer.login')->with('success', 'You have been logout');
    }
    public function create(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|confirmed|min:6',
            'g-recaptcha-response' => ['required', new \App\Rules\Recaptcha]
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $customer = new Customer($data);
        $customer->save();
        return redirect()->route('customer.login')->with('success', 'You have registered a new account');

    }
}
