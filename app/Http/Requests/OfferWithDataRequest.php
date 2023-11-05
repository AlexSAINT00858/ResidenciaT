<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class OfferWithDataRequest extends FormRequest
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
                'offerName' => 'required | string | max:100',
                'descriptionOffer' => 'required | string | max:200',
                'salary' => 'nullable |regex:/^\d*(\.\d{0,3})?$/'
            ];
        }
    }
