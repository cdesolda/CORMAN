<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
        $user = $this->route()->parameter('user');
        
        return [

            'first_name' => ['bail','required','regex:/^[A-Za-z\-àéèìòù ]+$/','max:255'], //Don't remove the space!
            'last_name' => ['bail','required','regex:/^[A-Za-z\-àéèìòù ]+$/','max:255'], //Don't remove the space!
            'dob' => 'bail|required|date|after:01/01/1900|before:01/01/2000',
            'email' => 'bail|nullable|email|max:255|unique:users,email,'.$user->id,
            'password' => 'bail|nullable|confirmed|min:6|max:255',
            'password_confirmation' => 'bail',
            'user_pic' => 'bail|image|max:15000',
            'role' => 'required|exists:roles,id',
            'affiliation' => 'required|filled',
            'topics.*' => 'filled|max:50',
            'personal_link' => 'bail|nullable|url|max:1620'
        ];
    }
}
