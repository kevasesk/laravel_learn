<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins;

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
        if($admin){
            $request->session()->put('loggedIn', $admin->id);
            return redirect()->route('dashboard');

        }else{
            return redirect('admin');
        }

    }
}
