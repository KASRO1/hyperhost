<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSeoRequest extends FormRequest
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

                'page_url' => [
                    'required',
                    'string',
                    'max:50',
                    'unique:s_e_o_s',
                ],
                'title' => [
                    'required',
                    'string',
                ],
                'keywords' => [
                    'required',
                    'string',
                ],
                'description' => [
                    'required',
                    'string',
                ]

        ];
    }
}
