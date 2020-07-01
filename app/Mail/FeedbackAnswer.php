<?php

namespace App\Mail;

use App\Models\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackAnswer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Feedback
     */
    public $feedback;
    /**
     * @var string
     */
    public $answer;

    /**
     * Create a new message instance.
     *
     * @param Feedback $feedback
     * @param string $answer
     */
    public function __construct(Feedback $feedback, string $answer)
    {
        $this->feedback = $feedback;
        $this->answer = $answer;
    }

    /**
     * @return FeedbackAnswer
     */
    public function build(): FeedbackAnswer
    {
        return $this->view('emails.answer');
    }
}
