<?php

namespace App\Jobs;

use App\Mail\WelcomeEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public $userdetail;
    public $subject;
    public $file;
    public function __construct($user, $subject, $file)
    {
        $this->userdetail = $user;
        $this->subject = $subject;
        $this->file = $file;


    }

    /**
     * Execute the job.
     */
    public function handle()
    {

        try {
            Mail::to($this->userdetail->email)->send(new WelcomeEmail($this->userdetail, $this->subject, $this->file));
        }catch (\Exception $e) {
            Log::error('Failed to send email to '.$this->userdetail->name.': '.$e->getMessage());
            $this->release(60);
        }
    }
}
