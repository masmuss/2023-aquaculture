<?php

namespace App\Http\Requests\Pool;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePoolRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'hardware_id' => 'required|string',
            'name' => 'required|string',
            'wide' => 'required|numeric',
            'long' => 'required|numeric',
            'depth' => 'required|numeric',
            'noted' => 'nullable|string|max:255',
        ];
    }
}
