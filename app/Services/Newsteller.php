<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsteller
{
    public function subscribe(string $email)
    {
        $this->client()->lists->addListMember('d6dfs6dsfs', [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
    protected function client()
    {
        $mailchimp = new ApiClient();
        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'serve' => 'us6'
        ]);
        return $mailchimp;
    }
}
