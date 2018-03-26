<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGroupRequest extends FormRequest
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
            'name' => 'bail|required|filled|unique:groups,name|max:255',
            'description' => 'bail|nullable|max:1000',
            'group_picture' => 'bail|image|max:15000',
            'visibility' => 'required|in:public,private',
            
            'users' => 'nullable',
            'users.*' => 'required|filled',
            'topics' => 'nullable',
            'topics.*' => 'filled|max:50'
        ];
    }
}
