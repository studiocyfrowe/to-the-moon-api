<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'image_profile_url' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'fav_quote' => ['string']
        ];
    }
}
