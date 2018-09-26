<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbum extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'artists_id' => 'required|integer|exists:artists,id',
            'title' => 'required|string|max:255',
            'alt_title' => 'string|max:255',
            'year' => 'required|integer',
            'description' => 'max:255',
            'has_explicit_lyrics' => 'required|boolean',
            'full_album_price' => 'between:0.00,999.99',
            'rank' => 'integer|between:1,20',
            'is_active' => 'boolean',
            'deleter_id' => 'integer|exists:users,id'
        ];
    }
}
