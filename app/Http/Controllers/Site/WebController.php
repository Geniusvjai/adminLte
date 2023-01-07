<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\WebBanner;
use App\Models\Cart;
use App\Models\WebSubscribe;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class WebController extends Controller
{
    public function Home()
    {
        $bannerData = WebBanner::get()->toArray();
        $CategoryData = Category::get()->toArray();
        $KidsProductData = Product::where('category_id', 1)->get()->count();
        $MenProductData = Product::where('category_id', 2)->get()->count();
        $WomenProductData = Product::where('category_id', 3)->get()->count();
        $ProductData = Product::get();
        $DescProductData = Product::orderby('id', 'DESC')->get();
        // dd($bannerData);
        return view('site.index', compact('bannerData', 'CategoryData', 'MenProductData', 'WomenProductData', 'KidsProductData', 'ProductData', 'DescProductData'));
    }

    public function ProductDetails(Request $request, $id)
    {
        $CartValue = Cart::get()->count();
        $DetailOfProduct = Product::where('id', '=', $id)->get()->toArray();
        return view('site.detail', compact('DetailOfProduct', 'CartValue'));
    }

    public function ProductCategory(Request $request, $id)
    {
        $ProductCat = Product::where('category_id', '=', $id)->get()->toArray();
        $CatData = Category::where('id', '=', $id)->get();
        // dd($ProductCat);
        return view('site.shop', compact('ProductCat', 'CatData'));
    }

    public function TotalProduct(Request $request)
    {   

        if($request->price == '0-100'){
            $AllProduct = Product::whereBetween('sale_price', [0,100])->get()->toArray();
        }else if($request->price == '100-200'){
            $AllProduct = Product::whereBetween('sale_price', [100,200])->get()->toArray();
        }else if($request->price == '200-300'){
            $AllProduct = Product::whereBetween('sale_price', [200,300])->get()->toArray();
        }else if($request->price == '300-400'){
            $AllProduct = Product::whereBetween('sale_price', [300,400])->get()->toArray();
        }else if($request->price == '400-500'){
            $AllProduct = Product::whereBetween('sale_price', [400,500])->get()->toArray();
        }else if($request->price == 'all'){
            $AllProduct = Product::get()->toArray();
        }else{  
            $AllProduct = Product::get()->toArray();
        }
        return view('site.shop', compact('AllProduct'));
    }

    public function ShopPage()
    {
        return view('site.shop');
    }

    // email subscribed section 
    public function EmailSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $mailCheck = WebSubscribe::where('email_id', '=', $request->email)->first();
        if ($mailCheck) {
            return response()->json(['fail' => 'Email Already Subscribed']);
        } else {
            $emailSubscribe = new WebSubscribe();
            $emailSubscribe->email_id = $request->email;
            $mailSub = $emailSubscribe->save();
            if ($mailSub) {
                return response()->json(['success' => 'You Have Subscribed']);
            }
            return view('site.cart');
        }
    }

    public function ShopCheckoutPage()
    {
        return view('site.checkout');
    }
}
