<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function priceData(){
        // dd('hello');
        return back()->with('success', 'success');
    }
}
