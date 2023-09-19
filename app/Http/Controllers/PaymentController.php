<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\mail\reciept;
use App\Order;
use App\OrderParent;
use App\Coupon;
use App\Product;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
  
    public function verifyPayment(Request $request) {
        try {
        
            $reference = $request->reference;
            $amount = $request->amount;
            $firstName = $request->firstName;
            $lastName = $request->lastName;
            $email = $request->email;
            $phone = $request->phone;
            $cart = $request->cart;
            $transactionID = $request->transId;
            $address = $request->address;
            $coupon = $request->coupon;

            \Log::info($coupon);

            $key = env('SK_KEY');
            \Log::info($key);

            $url = 'https://api.paystack.co/transaction/verify/' . $reference;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt(
                $ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $key]
            );
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $curlResponse = curl_exec($ch);


            if(curl_errno($ch)) 
            {
                $resp['msg'] = curl_error($ch);
                $verified = curl_errno($ch);
                \Log::info('cURL error occured while trying to verify payment.');
                \Log::error(curl_error($ch));
                //update the transaction that the verification failed due to curl error.
            } 
            else 
            {
                if ($curlResponse)
                {
                    $resp = json_decode($curlResponse, true);
                    \Log::info($resp["data"]["amount"]);

                    \Log::info('Payment successfully verified.');
                        //create order
                        $orderCart = json_decode($cart, true);
                        $couponObj = Coupon::where('code', $coupon)->first();

                        $order_parent = new OrderParent;
                        $order_parent->firstName = $firstName;
                        $order_parent->lastName = $lastName;
                        $order_parent->address = $address;
                        $order_parent->phoneNumber = $phone;
                        $order_parent->email = $email;
                        $order_parent->paymentStatus = 'unverified';
                        if(Auth::check())
                        {
                            $order_parent->user_id = Auth::user()->id;
                        }
                        else
                        {
                            $order_parent->user_id = -1;
                        }

                        $order_parent->coupon = $coupon;
                        if($coupon != '')
                        { 
                            if($couponObj->type == 'percentage')
                            {
                                $order_parent->coupon_discount = $order_parent->price * $couponObj->value/100;
                            }
                            else if($couponObj->type == 'value')
                            {
                                $order_parent->coupon_discount = $couponObj->value;
                            }
                        }

                        $order_parent->paymentReference = $reference;
                        $order_parent->transId = $transactionID;
                        $order_parent->orderStatus = 'pending';
                        $order_parent->save();


                        foreach($orderCart as $orderCartItem)
                        {
                            \Log::info($orderCartItem);
                            //Save order Items here
                            $order = new Order;
                            $order->order_parent_id = $order_parent->id;

                            // $order->firstName = $firstName;
                            // $order->lastName = $lastName;
                            // $order->address = $address;
                            // $order->phoneNumber = $phone;
                            // $order->email = $email;
                            // if(Auth::check())
                            // {
                            //     $order->user_id = Auth::user()->id;
                            // }
                            // else
                            // {
                            //     $order->user_id = -1;
                            // }

                            $order->product = $orderCartItem['product_name'];
                            $order->quantity = $orderCartItem['purchaseQty'];
                            $order->unit_qty = $orderCartItem['product_qty'];
                            $order->image = $orderCartItem['product_image'];
                            // $order->unit_price = $orderCartItem['product_qty'];

                            if($orderCartItem['promotion'] == 0)
                            {
                                $order->price = $orderCartItem['product_price'];
                            }
                            else
                            {
                                $order->price = $orderCartItem['promoPrice'];
                            }

                            // $order->coupon = $coupon;

                            // if($coupon != '')
                            // { 
                            //     if($couponObj->type == 'percentage')
                            //     {
                            //         $order->coupon_discount = $order->price * $couponObj->value/100;
                            //     }
                            //     else if($couponObj->type == 'value')
                            //     {
                            //         $order->coupon_discount = $couponObj->value;
                            //     }
                            // }

                            // $order->paymentReference = $reference;
                            // $order->transId = $transactionID;
                            // $order->orderStatus = 'pending';
                            $order->save();

                            $product = Product::find($orderCartItem['product_id']);
                            $product->inventory_qty -=  $orderCartItem['purchaseQty'] * $orderCartItem['product_qty'];
                            $product->save();
                        }

                        if($coupon != '')
                        { 
                            $couponObj = Coupon::where('code', $coupon)->first();
                            $couponObj->status = 'used';
                            $couponObj->save();
                        }

                    if($amount * 100 == $resp["data"]["amount"])
                    {
                        
                        $order_parent->paymentStatus = 'verified';
                        $order_parent->save();
                        // send sms............
                        $msg = "Hi ".$firstName.", Thanks for shopping with 2K Supermart! Your order has been confirmed and would be delivered shortly. Your payment reference is: ".$reference.".";
                        //uncomment this when going to production
                        $smsResponse = $this->send_sms($phone, $msg);

                        $this->sendMail($reference, $email);

                        return response()->json($resp);
                    }
                }
            }
                //code...
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($status = false);
        }
    }

    public function sendMail($paymentReference, $email)
    {
        $order = OrderParent::where('paymentReference', $paymentReference)->get();
        // \Log::info($order);
        Mail::to($email)->send(new reciept($order));
        // ->subject($title)

        return response()->json($status = true);

    }

    public function send_sms($phone, $message){
        $message = str_replace(" ","%20", $message);
        $phone = preg_replace('/0/', '234', $phone, 1);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://app.bulksms.net.ng/api/v1/http.php?api_key=c1e23e4e&recipient=$phone&message=$message&sender=2ksupermart&route=3",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function getReceiptDetails($ref)
    {
        $order = Orderparent::where('paymentReference', $ref)->get();
        $firstOrder = $order;
        \Log::info($firstOrder);

        return response()->json([$order, $firstOrder]);
    }

    public function applyCoupon($code)
    {
        $coupon = Coupon::where('code', $code)->first();
        if($coupon == null)
        {
            return response()->json(['status' => false, 'message' => 'invalid coupon code']);
        }
        else if($coupon != null)
        {
            if($coupon->status == 'unused')
            {
                // $coupon->status = 'used';
                // $coupon->save();
                return response()->json(['status' => true, 'message' => 'success', 'value' => $coupon->value, 'type' => $coupon->type]);
            }
            else
            {
                return response()->json(['status' => false, 'message' => 'Coupon has been used']);
            }
        }
    }
}