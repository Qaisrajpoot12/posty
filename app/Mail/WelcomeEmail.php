<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $users;
    public $subject;
    public $file;

    public function __construct($user,$subject,$file)
    {
        $this->users = $user;
        $this->subject = $subject;
        $this->file = $file;
    }

    public function build()
    {
        return $this->view($this->file)
                    ->subject($this->subject)
                    ->with([
                        'name' => $this->users->name,
                    ]);
    }
}
