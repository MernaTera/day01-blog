<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'creator_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
        ];
    }

    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array<string, string>
 */
public function messages(): array
{
    return [
        'title.required' => 'A title is required',
        'title.min' => 'Title must be at least 3 characters',
        'description.required' => 'A description is required',
        'description.min' => 'Description must be at least 10 characters',
        'creator_id.required' => 'A creator is required',
    ];
}
}
