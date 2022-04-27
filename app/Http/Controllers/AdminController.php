<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        if(session()->has('loggedIn')){
            $admin = Admins::query()->where('id','=', session()->get('loggedIn'))->first();
            $data = [
                'name' => $admin->name,
                'email' => $admin->email,
                'breadcrumbs' => [
                    ['url' => 'breadcrumbs', 'title' => 'Dashboard']
                ],
            ];
        }
        return view('admin.dashboard', $data);
    }
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $admin = Admins::query()->where('name','=', $request->name)->first();
        if($admin && Hash::check($request->password, $admin->password)){
            $request->session()->put('loggedIn', $admin->id);
            return redirect()->route('dashboard');
        }else{
            $validator = Validator::make([], []);
            $validator->getMessageBag()->add('password', 'There is no such admin or password is incorrect.');
            return redirect('admin')->withErrors($validator);
        }

    }
    public function register()
    {
        return view('admin.register');
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);
        try{
            $newAdmin = new Admins();
            $newAdmin->name = $request->name;
            $newAdmin->password = Hash::make($request->password);
            $newAdmin->email = $request->email;
            $newAdmin->save();
            return redirect('admin')->with('success', 'Admin was successfully created.');
        }catch (\Exception $e){
            $validator = Validator::make([], []);
            $validator->getMessageBag()->add('error', 'Something going wrong while creating admin');
            return redirect('register')->withErrors($validator);
        }

    }
}
