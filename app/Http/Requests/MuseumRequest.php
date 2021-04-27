<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MuseumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'museum.name'=> 'required',
            'museum.place'=> 'required',
            'museum.time'=> 'nullable',
            'museum.day'=> 'nullable',
            'museum.money'=> 'nullable',
            'museum.traffic'=> 'nullable',
            'museum.sns'=> 'nullable',
            'museum.tel'=> 'nullable',
            'museum.homepage'=> 'nullable',
            'museum.other'=> 'nullable',
        ];
    }
}
