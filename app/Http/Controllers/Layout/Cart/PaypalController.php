<?php

namespace App\Http\Controllers\Layout\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Mail\OrderPaid;
// use NunoMaduro\Collision\Provider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\ItemList;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Api\Payer;
use PayPal\Api\Item;
// use Srmklive\PayPal\Services\ExpressCheckout;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;

class PaypalController extends Controller
{
    public function button(){
        return view('layouts.paypal-button');
    }
    public function create(){

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'ART5410LrcA-NtVa32NgwChrKpuniRcMQ1BQToD47UZNuXXOqD5Iy-m0X7PPfshXipSufd9fzmqRuvrg',     // ClientID
                'EGDZfo2lccUX50-QbDw91HBY76q8tG5lniRYVnFKbCIPafgiSb-6iXEXog9hMnFwHKr26-6gXwacx9hG'      // ClientSecret
            )
        );
        $order=Order::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        // dd($order);
        $payer=new Payer();
        $payer->setPaymentMethod('paypal');
        $item=new Item();
        $item->setName($order->order_number)->setCurrency('USD')->setQuantity(1)->setSku('123123')->setPrice($order->grand_total);
        // dd($item);
        // $item2=new Item();
        // $item2->setName('sky coffe 40 02')->setCurrency('USD')->setQuantity(5)->setSku('321321')->setPrice(2);
        $itemList=new ItemList();
        $itemList->setItems([$item]);
        $details=new Details();
        $details->setShipping(1.2)->setTax(1.3)->setSubtotal($order->grand_total);
        $total=$order->grand_total+1.2+1.3;
        // dd($total);
        $amount=new Amount();
        $amount->setCurrency('USD')->setTotal($total)->setDetails($details);
        $transaction= new Transaction();
        $transaction->setAmount($amount)->setItemList($itemList)->setDescription('payment Description')->setInvoiceNumber(uniqid());
        $redirectUrls=new RedirectUrls();
        $redirectUrls->setReturnUrl('http://localhost:8000/execute-payment')->setCancelUrl('http://localhost:8000/cancel');
        $payment=new Payment();
        $payment->setIntent('sale')->setPayer($payer)->setRedirectUrls($redirectUrls)->setTransactions([$transaction]);
        // dd($apiContext);
        $payment->create($apiContext);
        // return $payment->getApprovalLink();
        return redirect($payment->getApprovalLink());

    }
    public function execute(){
        // dd(request('PayerID'));
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'ART5410LrcA-NtVa32NgwChrKpuniRcMQ1BQToD47UZNuXXOqD5Iy-m0X7PPfshXipSufd9fzmqRuvrg',     // ClientID
                'EGDZfo2lccUX50-QbDw91HBY76q8tG5lniRYVnFKbCIPafgiSb-6iXEXog9hMnFwHKr26-6gXwacx9hG'      // ClientSecret
            )
    );
    $paymentId=request('paymentId');
    $payment=Payment::get($paymentId,$apiContext);
    $execution=new PaymentExecution();
    $execution->setPayerId(request('PayerID'));
    $transaction= new Transaction();
    $amount=new Amount();
    $details=new Details();
    $order=Order::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
    $total=$order->grand_total+1.2+1.3;

    $details->setShipping(1.2)->setTax(1.3)->setSubtotal($order->grand_total);
    $amount->setCurrency('USD');
    $amount->setTotal($total);
    $amount->setDetails($details);
    $transaction->setAmount($amount);
    $execution->addTransaction($transaction);
    $result=$payment->execute($execution,$apiContext);
    return $result;
    }
//     public function getExpressCheckout($orderId)
//     {
//         $checkoutData = $this->checkoutData($orderId);
//         $provider = new ExpressCheckout();
//         $response = $provider->setExpressCheckout($checkoutData);
//         dd($response);
//         return redirect($response['paypal_link']);
//     }

//     private function checkoutData($orderId)
//     {
//         // $cart = \Cart::session(auth()->id());
//         $cartItems = array_map(function ($item) {
//             return [
//                 'name' => $item['name'],
//                 'price' => $item['price'],
//                 'qty' => $item['quantity']
//             ];
//         },\Cart::getContent()->toarray());



//         $checkoutData = [
//             'items' => $cartItems,
//             'return_url' => route('paypal.success', $orderId),
//             'cancel_url' => route('paypal.cancel'),
//             'invoice_id' => uniqid(),
//             'invoice_description' => " Order description ",
//             'total' => \Cart::getTotal()
//         ];
//         return $checkoutData;
//     }

//     public function cancelPage()
//     {
//         dd('payment failed');
//     }


//     public function getExpressCheckoutSuccess(Request $request, $orderId)
//     {

//         $token = $request->get('token');
//         dd($token);

//         $payerId = $request->get('PayerID');
//         $provider = new ExpressCheckout();
//         $checkoutData = $this->checkoutData($orderId);

//         $response = $provider->getExpressCheckoutDetails($token);

//         if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

//             // Perform transaction on PayPal
//             $payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $payerId);
//             $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

//             if(in_array($status, ['Completed','Processed'])) {
//                 $order = Order::find($orderId);
//                 $order->is_paid = 1;
//                 $order->save();

//                 //send mail

//                 Mail::to($order->user->email)->send(new OrderPaid($order));


//                 return redirect()->route('home')->withMessage('Payment successful!');
//             }

//         }

//         return redirect()->route('home')->withError('Payment UnSuccessful! Something went wrong!');


//     }
 }
