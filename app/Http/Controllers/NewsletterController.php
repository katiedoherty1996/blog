<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailChimpNewsletter;
use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public function __invoke()
    {

            request()->validate(['email'=> 'required|email']);
        
            try{
        
                $listId = '8934e6906e';
                $url = "https://us21.api.mailchimp.com/3.0/lists/{$listId}/members";
        
                $client = (new MailChimpNewsletter)->subscribe(request('email'));
                $client->post($url);
        
                return redirect('/')->with('success', 'You are now signed up for our newsletter!');
        
            } catch (\Exception $e) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'email' => 'This email could not be added to our user list'
                ]);
            }
    }
}
