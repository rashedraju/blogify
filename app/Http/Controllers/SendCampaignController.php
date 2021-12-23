<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class SendCampaignController extends Controller
{
    public function __invoke(Newsletter $campaigns, $id)
    {
        try {
            $campaigns->sendCampaign($id);
            return redirect('/admin/campaigns')->with('succss', "Campaign id: $id Sent Sucessfully" );
        } catch (\Exception $e) {
            throw ValidationException::withMessages(['campaign' => $e->getMessage()]);
        }
    }
}
