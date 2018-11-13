<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 1/9/2018
 * Time: 10:27 PM
 */
namespace App\Http\Controllers;

class MpesaOAuth
{
    public function generateToken()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, config('services.mpesa.oauth_url'));
        $credentials = base64_encode(config('services.mpesa.key').':'.config('services.mpesa.secret'));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, config('services.mpesa.ssl'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        return $curl_response;
    }
}