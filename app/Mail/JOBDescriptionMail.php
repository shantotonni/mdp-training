<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JOBDescriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $name;
    public $Designation;

    public function __construct($data,$name,$Designation)
    {
        $this->data = $data;
        $this->name = $name;
        $this->Designation = $Designation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@aci-bd.com')->subject('Job Description Submitted Mail')->view('mail.job_description',[
            'data' => $this->data,
            'name' => $this->name,
            'Designation' => $this->Designation,
        ]);
    }
}
