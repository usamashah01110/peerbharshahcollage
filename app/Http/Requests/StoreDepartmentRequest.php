<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // or your auth logic
    }

    public function rules(): array
    {
        return [
            'name'             => 'required|string|min:2|max:150',
            'code'             => 'required|string|min:2|max:20|unique:departments,code|regex:/^[A-Za-z0-9\-_]+$/',
            'description'      => 'nullable|string|max:1000',
            'hod_id'           => 'nullable|integer|exists:users,id',
            'established_date' => 'nullable|date|before_or_equal:today',
            'is_active'        => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'code.unique' => 'This department code is already in use.',
            'code.regex'  => 'Code may only contain letters, numbers, dashes, and underscores.',
            'established_date.before_or_equal' => 'Established date cannot be in the future.',
        ];
    }
}
