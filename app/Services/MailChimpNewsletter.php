<?php

    namespace App\Services;

    use GuzzleHttp\Client;
    use MailchimpMarketing\ApiClient;

    class MailChimpNewsletter implements Newsletter
    {
        // public function __construct( ApiClient $client)
        // {
            
        // }

        public function subscribe(String $email){
            
        $apiKey = '538f5f8b4729a5020cef4e49cb7e7f01-us21';

        $client = new Client([
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                "email_address" => $email,
                "status" => "subscribed",
            ],
        ]);

        return $client;

        }

    }