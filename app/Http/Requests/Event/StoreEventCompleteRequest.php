<?php

declare(strict_types=1);

namespace App\Http\Requests\Event;

use App\Enums\StageEnum;
use App\Enums\VisibilityEnum;
use App\Rules\MinWords;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

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
            'place_name' => ['required', 'string', 'max:85', new MinWords()],
            'zip_code' => ['required', 'string', 'min:8', 'max:9'],
            'street' => ['required', 'string', 'max:100'],
            'number' => ['required', 'string', 'max:10'],
            'complement' => ['nullable', 'string', 'max:50'],
            'neighborhood' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:80'],
            'state' => ['required', 'string', 'max:2'],
            'cover' => [
                'nullable',
                File::types(['png', 'jpg'])->max(2 * 1024),
                'required_if:stage,'.StageEnum::PUBLISHED->value,
            ],
            'title' => ['required', 'string', 'max:150', new MinWords(2)],
            'description' => ['required', 'string', 'max:255', new MinWords(5)],
            'start_time' => ['required', 'date', 'after:tomorrow'],
            'end_time' => ['required', 'date', 'after:start_time'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'created_by' => ['nullable'],
            'visibility' => ['required', Rule::enum(VisibilityEnum::class)],
            'stage' => ['required', Rule::in(StageEnum::DRAFT, StageEnum::PUBLISHED)],
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
