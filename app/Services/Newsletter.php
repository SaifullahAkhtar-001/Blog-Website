<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use MailchimpMarketing\ApiClient;

class Newsletter extends Model
{
    public function subscribe($email,$list = null){
        $list ??=  config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember($list ,[
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
    protected function client(){
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us11'
        ]);
    }
}
