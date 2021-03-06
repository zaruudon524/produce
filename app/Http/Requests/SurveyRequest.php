<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
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
     
    // public function authorize()
    // {
    //     return true;
    // }
    public function rules()
    {
        return [
            'living' => 'required',
            'livingplace' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'havecome' => 'required',
            'reasoncoming' => 'required',
            'transportation' => 'required',
            'howknow' => 'required',
            'comeagain' => 'required',
            'comeagainform' => 'required',
            'image' => 'required',
            'reasonnotcoming' => 'required'
        ];
    }
    
    public function messages()
    {
    return [
        'required' => '必須項目です。',
    ];
    }
}
