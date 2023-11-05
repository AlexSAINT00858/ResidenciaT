<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class CompanyRequest extends FormRequest
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
                'nameCompany' => 'required | string | max:20',
                'address' => 'nullable | string | max:40',
                'phoneNumber' => 'nullable | regex:/^[0-9]{10}$/ | max:10',
                'email' => 'required | email | max:45',
                'logo' => 'nullable'
            ];
        }
    }
