<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class CampaignsController extends Controller {
    protected $campaigns;

    public function __construct( Newsletter $campaigns ) {
        $this->campaigns = $campaigns;
    }

    public function index() {
        return view( 'admin.newsletters.campaigns.index', ['campaigns' => $this->campaigns->getCampaigns()] );
    }

    public function show( $id ) {
        try {
            $campaign = $this->campaigns->getCampaign( $id );
            return view( 'admin.newsletters.campaigns.show', compact( 'campaign' ) );
        } catch ( \Exception $e ) {
            throw ValidationException::withMessages( ['campaign' => $e->getMessage()] );
        }

    }

    public function destroy( $id ) {
        try {
            $this->campaigns->deleteCampaign( $id );

            return back()->with( 'success', 'Campaign Deleted Successfully' );
        } catch ( \Exception $e ) {
            throw ValidationException::withMessages( ['campaign' => $e->getMessage()] );
        }
    }
}
