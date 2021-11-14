<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'review.title' => 'required|string|max:100',
            'review.body' => 'required|string|max:400',
            'post_img' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
    
    public function messages()
    {
        return [
        'review.title.required' => '必須項目です。',
        'review.body.required' => '必須項目です。',
        'post_img.file' => 'ファイルのアップロードに失敗しました',
        'post_img.image' => 'アップロード可能な画像は「jpg」「png」「bmp」「gif」「svg」です',
        'post_img.max' => 'アップロードするファイルは10MBまでです'
        ];
    }
    
}
