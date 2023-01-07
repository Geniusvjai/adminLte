<?php

namespace App\Http\Controllers\Site;

use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function OrdersData(){
        $userOrderData = Payment::where('user_id', Auth::guard('webs')->user()->id)->get()->toArray();
        $userOrderDetailsData = PaymentDetail::where('user_id', Auth::guard('webs')->user()->id)->get()->toArray();
        // dd(Auth::guard('webs')->user()->id);
        return view('site.orders', compact('userOrderData','userOrderDetailsData'));
    }

    public function showOrderDetails(Request $request){
        $openDataModal = PaymentDetail::where('id', $request->order_id)->get()->toArray();
        // dd($openDataModal);
        return response()->json(['openDataModal'=> $openDataModal]);
    }
}
