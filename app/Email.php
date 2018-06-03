<?php
amespace AppMail;
use IlluminateBusQueueable;
use IlluminateMailMailable;
use IlluminateQueueSerializesModels;
use IlluminateContractsQueueShouldQueue;
class DemoEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The demo object instance.
     *
     * @var Demo
     */
  //  public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
      // $this->message = $message;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       // return $this->view('emails/email_plain')->with($message)->subject('Письмо с chammy блог');
    }
}