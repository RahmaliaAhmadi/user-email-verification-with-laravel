<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
class UserVerificationMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user; // user object container
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('auth.user_email_verification')
                            ->with([
                                    'company_name' => config('app.name'),
                                    'registered_datetime' => $this->user->created_at->format('F d, Y'),
                                    'access_code' => $this->user->access_code,
                                    'user' => $this->user->id
                                ]);
    }
}
