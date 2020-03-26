<?php

namespace App\Listeners;

use App\Mail\NewUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserListener implements ShouldQueue
{
    public function handle($event)
    {
        Mail::to($event->customer->email)->send(new NewUserMail);        
    }
}
