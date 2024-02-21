<?php

namespace App\Mail;

use App\Models\Question;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuestionMail extends Mailable
{
    use Queueable, SerializesModels;
    public $object;
    public $related_1 ;
    public $related_2 ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Question $object ,$related_1 ,$related_2)
    {
        $this->object = $object;
        $this->related_1 =  $related_1 ;
        $this->related_2 =  $related_2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.Question')->subject('Yeni Soru Formu')->replyTo([$this->object->email]);
    }
}
