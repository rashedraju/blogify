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

    public function getCampaign(string $id){
        return $this->client->campaigns->get($id);
    }

    public function getCampaigns(){
        return $this->client->campaigns->list()->campaigns;
    }

    public function sendCampaign(string $campaignId){
        return $this->client->campaigns->send($campaignId);
    }

    public function deleteCampaign(string $id){
        return $this->client->campaigns->remove($id);
    }
}
