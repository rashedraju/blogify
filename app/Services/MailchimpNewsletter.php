<?php

namespace App\Services;

class MailchimpNewsletter implements Newsletter
{

    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function subscribe(string $email)
    {
        return $this->client->lists->addListMember((config('services.mailchimp.lists.subscribers')), [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
}
