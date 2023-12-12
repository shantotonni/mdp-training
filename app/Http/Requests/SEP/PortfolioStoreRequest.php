<?php

namespace App\Http\Requests\SEP;

use Cassandra\Exception\TruncateException;
use Illuminate\Foundation\Http\FormRequest;

class PortfolioStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'DivCode'=>'required',
            'PortfolioName'=>'required',
        ];
    }
}
