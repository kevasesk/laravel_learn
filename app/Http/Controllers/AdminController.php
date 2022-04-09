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
        if($admin){
            $request->session()->put('loggedIn', $admin->id);
            return redirect()->route('dashboard');

        }else{
            return redirect('admin');
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
            $newAdmin->password = $request->password;
            $newAdmin->email = $request->email;
            $newAdmin->save();
            return redirect('admin');
        }catch (\Exception $e){
            return redirect('register');
        }

    }
}
