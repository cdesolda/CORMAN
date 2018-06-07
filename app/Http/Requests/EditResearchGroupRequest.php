<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

use App\ResearchGroup;

class EditResearchGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
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

        $groupID = $this->route()->parameter('group');
        
        return [
            'group_name' => 'bail|required|filled|max:255|unique:groups,name,'.$groupID,
            'description' => 'bail|nullable|max:1000',
            'profile_photo' => 'bail|image|max:15000',
            'visibility' => 'required|in:public,private',
            
            'users' => 'required',
            'users.*' => 'required|filled',
            'offices' => 'nullable',
            'offices.*' => 'filled|max:50',
            'researchLines' => 'nullable',
            'researchLines.*' => 'filled|max:50'
        ];
    }
}
