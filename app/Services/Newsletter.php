<?php

namespace App\Services;

interface Newsletter
{
    public function subscribe(string $email);

    public function getCampaigns();

    public function sendCampaign(string $campaignId);
}
