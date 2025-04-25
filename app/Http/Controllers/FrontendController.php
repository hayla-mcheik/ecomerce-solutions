<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontendController extends Controller
{
    public function home()
    {
        return Inertia::render('Frontend/Home');
    }

    public function services()
    {
        return Inertia::render('Frontend/Services');
    }

    public function projects()
    {
        return Inertia::render('Frontend/Projects');
    }



    public function about()
    {
        return Inertia::render('Frontend/About');
    }

    public function contact()
    {
        return Inertia::render('Frontend/Contact');
    }



}
