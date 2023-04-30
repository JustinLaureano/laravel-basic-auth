<?php

namespace App\Listeners;

use App\Events\BasicAuthFailure;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogBasicAuthFailure
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BasicAuthFailure $event): void
    {
        Log::channel('auth')->error('Unauthorized SAP API login attempt');
    }
}
