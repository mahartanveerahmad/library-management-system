<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatebookRequest extends FormRequest
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
            'name' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'volume' => 'nullable|string',
            'issue' => 'nullable|string',
            'total_books' => 'nullable|integer',
            'donated_by' => 'nullable|string',
            'edition_of_book' => 'nullable|string',
        ];
    }
}
