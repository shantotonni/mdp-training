<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'=>$this->collection->transform(function ($user){
                return [
                    'ID'=>$user->ID,
                    'EmpCode'=>$user->EmpCode,
                    'Business'=>$user->Business,
                    'type'=>$user->type,
                ];
            })
        ];
    }
}
