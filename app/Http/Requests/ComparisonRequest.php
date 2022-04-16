<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComparisonRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            "error_messages" => "required|array|min:1",
            "error_messages.*.title" => "required",
            "error_messages.*.module" => "required",
            "error_messages.*.language"=> "required|array|min:1",
            "error_messages.*.language.code"=> "required",
            "error_messages.*.message" => "required",
            "error_messages.*.original_message" => "required",
        ];
    }
}
