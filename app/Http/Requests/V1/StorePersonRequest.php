<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => ['required'],
            'lastName' => ['required'],
            'mobileNumber' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'postCode' => ['required']
        ];
    }

    protected function prepareForValidation(){
        $this->merge(
            [
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'mobile_number' => $this->mobileNumber,
                'postcode' => $this->postCode
            ]
        );
    }
}
