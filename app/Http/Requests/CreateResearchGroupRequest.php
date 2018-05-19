<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateResearchGroupRequest extends FormRequest
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
            'contacts' => 'bail|required|max:1000',
            'group_picture' => 'bail|image|max:15000',
            
            'users' => 'nullable',
            'users.*' => 'required|filled',
            'research_lines' => 'nullable',
            'research_lines.*' => 'required|filled|max:50',
            'office' => 'nullable',
            'office.*' => 'required|filled|max:50'
        ];
    }
}
