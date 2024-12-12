<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Mail\OrderConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderConfirmationEmails
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
    public function handle(OrderPlaced $event): void
    {
        Mail::to($event->order->email)->send(new OrderConfirmationMail($event->order));

             
            $admins = User::whereIn('name', ['omar', 'shiko'])->pluck('email');
            Mail::to($event->order->email)
            ->cc($admins) // Send the email to admins as CC recipients
            ->send(new OrderConfirmationMail($event->order));
    }
}
