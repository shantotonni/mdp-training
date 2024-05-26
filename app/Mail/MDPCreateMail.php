<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MDPCreateMail extends Mailable
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

    public function build()
    {
        // return $this->view('view.name');
        return $this->from('no-reply@aci-bd.com')->subject('MDP Submitted')->view('mail.mdp_mail',[
            'data' => $this->data,
            'name' => $this->name,
            'Designation' => $this->Designation,
        ]);
    }
}
