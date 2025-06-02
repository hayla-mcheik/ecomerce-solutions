<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
        public function showConfirmation()
    {
        return Inertia::render('Frontend/Orders/Confirmation');
    }

}
