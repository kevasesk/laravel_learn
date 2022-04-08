<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\Post;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('page.contact-us');
    }
    public function send(Request $request)
    {
        dd($request);
    }
}
