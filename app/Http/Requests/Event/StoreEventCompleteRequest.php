<?php

declare(strict_types=1);

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreEventCompleteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'zip_code' => ['required', 'string', 'min:8', 'max:9'],
            'street' => ['required', 'string'],
            'number' => ['required', 'string', 'max:10'],
            'complement' => ['nullable', 'string'],
            'neighborhood' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string', 'max:255'],
            'start_time' => ['required', 'date', 'after:tomorrow'],
            'end_time' => ['required', 'date', 'after:start_time'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'created_by' => ['nullable'],
        ];
    }

    /**
     * Validate the class instance.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'zip_code' => Str::numbers($this->zip_code),
            'number' => $this->number,
            'category_id' => (int) $this->category_id,
            'created_by' => Auth::id(),
        ]);
    }
}
