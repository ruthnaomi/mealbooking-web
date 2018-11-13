<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 2/17/2018
 * Time: 5:58 AM
 */

namespace App\Http\Controllers;


use DateTime;

class LipaNaMpesa
{
    public function onlinePayment($token,$mobile,$amount=10)
    {
        $now=date("YmdHis");
        // dd ($now);
        $password=base64_encode(config('services.mpesa.payBillNo')."bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919".$now);
        // dd($password);
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$token)); //setting custom header

        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'BusinessShortCode' => config('services.mpesa.payBillNo'),
            'Password' => $password,
            'Timestamp' => $now,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $mobile,
            'PartyB' => config('services.mpesa.payBillNo'),
            'PhoneNumber' => $mobile,
            'CallBackURL' => 'http://12e9170f.ngrok.io/',
            'AccountReference' => 'Meal-Booking',
            'TransactionDesc' => 'Book Online'
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        //print_r($curl_response);

        return $curl_response;
    }
}