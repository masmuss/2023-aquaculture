<?php

namespace App\Http\Requests\Tool;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateToolRequest extends FormRequest
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
            'hardware_id' => 'required|string|exists:ponds,hardware_id',
            'pool_id' => 'required|numeric|exists:pools,id',
            'time' => 'required|string',
            'temperature' => 'required|numeric',
            'ph' => 'required|numeric',
            'salinity' => 'required|numeric',
            'do' => 'required|numeric',
        ];
    }
}
