<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Listing;

class StoreListingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->can('create', Listing::class) ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'company' => [
                'required',
                'max:255',
                Rule::unique('listings', 'company')->where(function ($query) {
                    return $query->where('user_id', $this->user()?->id);
                }),
            ],
            'location' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'website' => ['required', 'url', 'max:255'],
            'tags' => ['required', 'string', 'max:255'],
            'description' => ['required', 'max:2000'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'A job title is required.',
            'company.required' => 'A company name is required.',
            'company.unique' => 'You already have a listing for this company.',
            'location.required' => 'A location is required.',
            'email.required' => 'An email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'website.required' => 'A website URL is required.',
            'website.url' => 'Please provide a valid website URL.',
            'tags.required' => 'At least one tag is required.',
            'description.required' => 'A job description is required.',
            'logo.image' => 'The logo must be an image file.',
            'logo.mimes' => 'The logo must be a JPEG, PNG, JPG, or GIF file.',
            'logo.max' => 'The logo must not exceed 2MB.',
        ];
    }
}
