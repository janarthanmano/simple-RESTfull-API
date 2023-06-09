<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if($method == 'PUT'){
            return [
                'firstName' => ['required'],
                'lastName' => ['required'],
                'mobileNumber' => ['required'],
                'address' => ['required'],
                'city' => ['required'],
                'postCode' => ['required']
            ];
        }else{
            return [
                'firstName' => ['sometimes', 'required'],
                'lastName' => ['sometimes', 'required'],
                'mobileNumber' => ['sometimes', 'required'],
                'address' => ['sometimes', 'required'],
                'city' => ['sometimes', 'required'],
                'postCode' => ['sometimes', 'required'],
            ];
        }

    }

    protected function prepareForValidation(){

        if($this->firstName){
            $this->merge([ 'first_name' => $this->firstName ]);
        }

        if($this->lastName){
            $this->merge([ 'last_name' => $this->lastName ]);
        }

        if($this->mobileNumber){
            $this->merge([ 'mobile_number' => $this->mobileNumber ]);
        }

        if($this->postCode){
            $this->merge([ 'post_code' => $this->postCode ]);
        }

    }
}
