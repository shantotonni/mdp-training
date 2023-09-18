<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MDPTrainigFeedbackCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'training_list'=>$this->collection->transform(function ($feedback){
                return [
                    'ID'=>$feedback->ID,
                    'AppraisalPeriod'  => isset($feedback->mdp) ? $feedback->mdp->AppraisalPeriod: '',
                    'EmpCode'          => isset($feedback->mdp) ? $feedback->mdp->StaffID: '',
                    'TrainingID'       => isset($feedback->feedback) ? $feedback->feedback->TrainingID: '',
                    'TrainingTitle'    => $feedback->TrainingTitle,
                    'Status'           => isset($feedback->feedback) ? $feedback->feedback->Status: '',
                    'DoneDate'         => isset($feedback->feedback) ? $feedback->feedback->DoneDate: '',
                    'Feedback'         => isset($feedback->feedback) ? $feedback->feedback->Feedback: '',
                    'LearningTransfer' => isset($feedback->feedback) ? $feedback->feedback->LearningTransfer: '',
                    'OfferDateOne'     => isset($feedback->feedback) ? $feedback->feedback->OfferDateOne: '',
                    'OfferDateTwo'     => isset($feedback->feedback) ? $feedback->feedback->OfferDateTwo: '',
                    'OfferDateThree'   => isset($feedback->feedback) ? $feedback->feedback->OfferDateThree: '',
                    'OfferDateFour'    => isset($feedback->feedback) ? $feedback->feedback->OfferDateFour: '',
                    'OfferDateFive'    => isset($feedback->feedback) ? $feedback->feedback->OfferDateFive: '',
                ];
            })
        ];
    }
}
