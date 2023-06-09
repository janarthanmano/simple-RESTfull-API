<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BulkStorePersonRequest extends FormRequest
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
            '*.firstName' => ['required'],
            '*.lastName' => ['required'],
            '*.mobileNumber' => ['required'],
            '*.address' => ['required'],
            '*.city' => ['required'],
            '*.postCode' => ['required']
        ];
    }

    protected function prepareForValidation(){
        $data = [];

        foreach($this->toArray() as $obj){
            $obj['first_name'] = $obj['firstName'] ?? null;
            $obj['last_name'] = $obj['lastName'] ?? null;
            $obj['mobile_number'] = $obj['mobileNumber'] ?? null;
            $obj['postcode'] = $obj['postCode'] ?? null;

            $data[] = $obj;
        }

        $this->merge($data);
    }
}
