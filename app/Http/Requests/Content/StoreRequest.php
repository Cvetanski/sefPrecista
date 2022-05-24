<?php

    namespace App\Http\Requests\Content;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreRequest extends FormRequest
    {
        public function rules(): array
        {
            return [
                'title'             => 'required|string',
                'short_description' => 'required|string',
                'description'       => 'required|string|max:65000',
                'image2'            => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category_id'       => 'required|integer',
                'section_id'        => 'required|integer',
            ];
        }

        public function authorize(): bool
        {
            return true;
        }
    }