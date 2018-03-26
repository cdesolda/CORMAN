<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePublicationRequest extends FormRequest
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
            'title' => 'bail|required|filled|max:255',
            'publication_date' => 'bail|required|date|before_or_equal:today',
            'venue' => 'bail|required|filled|max:255',
            'type' => 'bail|required|alpha|in:journal,conference,editorship|max:255',
            'profilePic' => 'bail|image|max:15000',
            'visibility' => 'required|in:public,private',
            
            'authors' => 'nullable',
            'authors.*' => 'required|filled',
            'topics' => 'nullable',
            'topics.*' => 'filled|max:50',

            'pdf_file' => 'nullable|file|max:25000',
            'media_file.*' => 'nullable|max:10000'
        ];

    }
}
