<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'club_logo' => 'required|image|size:8192',
            'club_banner' => 'required|image|size:16000',
        ];
    }
}
