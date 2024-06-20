<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Crypt;
use Hash;

class registerFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => strip_tags($this->name),
            'email' => strip_tags($this -> email),
            'password' => Hash::make($this -> password),
            //'password' => Crypt::encrypt($this -> password),         
            
        ]);
    }
}
