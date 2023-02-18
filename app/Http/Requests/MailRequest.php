<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'max:2000'
        ];
    }

    public function messages()
    {
        return [
            'file' => 'choose the correct data type',
            'description'=>'max number of characters is 2048'
        ];
    }


}
