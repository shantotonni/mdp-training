<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MDPTrainigFeedbackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=>$this->ID,
            'Status'=>isset($this->feedback) ? $this->feedback->Status: '',
            'DoneDate'=>isset($this->feedback) ? $this->feedback->DoneDate: '',
            'Feedback'=>isset($this->feedback) ? $this->feedback->Feedback: '',
            'LearningTransfer'=>isset($this->feedback) ? $this->feedback->LearningTransfer: '',
            'OfferDateOne'=>isset($this->feedback) ? $this->feedback->OfferDateOne: '',
            'OfferDateTwo'=>isset($this->feedback) ? $this->feedback->OfferDateTwo: '',
            'OfferDateThree'=>isset($this->feedback) ? $this->feedback->OfferDateThree: '',
            'OfferDateFour'=>isset($this->feedback) ? $this->feedback->OfferDateFour: '',
            'OfferDateFive'=>isset($this->feedback) ? $this->feedback->OfferDateFive: '',
            'empcode'=>isset($this->feedback) ? $this->feedback->empcode: '',
            'AppraisalPeriod'=>isset($this->feedback) ? $this->feedback->AppraisalPeriod: '',
            'TrainingTitle'=>$this->TrainingTitle,
        ];
    }
}
