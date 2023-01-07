<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }
   

    /**
     * Call a view.
     */
    public function index()
    {
        return view('payment');
    }

    /**
     * Initiate a payment on PayPal.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function charge(Request $request)
    {
        // dd($request->all());
        // $pro_id =  $request->input('product_id');
        if ($request->input('submit')) {
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error'),
                ))->send();
            
                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch(Exception $e) {
                return $e->getMessage();
            }
        }
    }

    /**
     * Charge a payment and store the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function success(Request $request)
    {
        // dd($request->all());
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        // dd($cart_data);
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful()) {
                // dd($request->all());
                // The customer has successfully paid.
                $arr_body = $response->getData();
                $jsonData = json_encode($arr_body);
                $checkOrderID = Payment::select('order_id')->orderby('id', 'desc')->get()->toArray();
                if($checkOrderID == null){
                    $orderData = '1000';    
                }else{
                    // $orderData + '1';
                    $orderData = $checkOrderID[0]['order_id']+'1';
                }
                // Insert transaction data into the database
                $payment = new Payment;
                $payment->payment_id = $arr_body['id'];
                $payment->user_id = Auth::guard('webs')->user()->id;
                $payment->order_id = $orderData;
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->details = $jsonData;
                $payment->payment_status = $arr_body['state'];
                $payment->save();

                foreach ($cart_data as $key => $value) {
                    $paymentDetails = new PaymentDetail;
                    $paymentDetails->product_id = $value['item_id'];
                    $paymentDetails->user_id = Auth::guard('webs')->user()->id;
                    $paymentDetails->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $paymentDetails->product_name = $value['item_name'];
                    $paymentDetails->product_price = $value['item_price'];
                    $paymentDetails->product_image = $value['item_image'];
                    $paymentDetails->product_size = $value['item_size'];
                    $paymentDetails->product_color = $value['item_color'];
                    $paymentDetails->product_quantity = $value['item_quantity'];
                    $paymentDetails->save();
                }

                Cookie::queue(Cookie::forget('shopping_cart'));
                return redirect('/cart')->with("success", "Payment is successful. Your transaction id is: " . $arr_body['id']);
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }

    /**
     * Error Handling.
     */
    public function error()
    {
        return 'User cancelled the payment.';
    }
}
