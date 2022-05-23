<?php

    namespace App\Http\Requests\Category;

    use Illuminate\Foundation\Http\FormRequest;

    class UpdateRequest extends FormRequest
    {
        public function rules(): array
        {
            return [
                'title'       => 'required|string',
                'description' => 'required|string',
                'section_id'  => 'required|integer',
            ];
        }

        public function authorize(): bool
        {
            return true;
        }
    }