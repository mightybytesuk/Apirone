<?php

namespace Apirone;

class Apirone {

    function sendPostRequest($endpoint, $data, $method)
    {
        $url = 'https://apirone.com/api/v2/'.$endpoint;
 
        $curl = curl_init();
         
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

            if($method == 'post')
            {
                curl_setopt($curl, CURLOPT_POST, TRUE);
        
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
         
        $data = curl_exec($curl);
         
        curl_close($curl);

        echo $data;
    }

    public function account()
    {
        $this->sendPostRequest('accounts', '', 'post');
    }

    public function checkPayment($account, $currency, $address)
    {
        $endpoint = 'accounts/'.$account.'/balance?currency='.$currency.'&addresses='.$address;
        $this->sendPostRequest($endpoint, '', 'get');
        
    }

    public function generateAddress($account, $currency, $callback, $id)
    {
        $endpoint = 'accounts/'.$account.'/addresses';

        $data = array(
            '"currency": "'.$currency.'",
        "callback": {
            "method": "POST",
            "url": "'.$callback.'",
            "data": {
                "id": "'.$id.'"'
            );
        $this->sendPostRequest($endpoint, $data, 'post');
    }
}