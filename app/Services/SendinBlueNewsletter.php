<?php

namespace App\Services;

use GuzzleHttp\Client;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Api\ContactsApi;
use SendinBlue\Client\Model\CreateContact;

class SendinBlueNewsletter implements Newsteller
{
    public function subscribe(string $email, string $list = null)
    {       
        $list ??= config('services.sendinblue.api');
        $contact = new CreateContact();
        $contact['email'] = $email;
        $this->client($list)->createContact($contact);
    }
    public function client(string $list)
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $list);
        return new ContactsApi(
            new Client(),
            $config
        );
    }
}
