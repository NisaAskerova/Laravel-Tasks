<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendOTP extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details; // Store the OTP details
    }

    public function build()
    {
        Log::info($this->details);
        return $this->view('auth.otp') // Specify the view for the email
                    ->subject('Your OTP Code') // Set the email subject
                    ->with(['details' => $this->details]); // Pass the OTP details to the view
    }
}
