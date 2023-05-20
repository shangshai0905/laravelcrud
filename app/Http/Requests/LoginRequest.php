<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
            //
            'email' => 'required|email|max:255',
            'password' => 'required|min:8'
        ];
    }

    public function getCredentials() {
        $email = $this->get('email');
        if ($this->isEmail($email)) {
            return [
                'email' => $email, 
                'password' => $this->get('password')
            ];
        }
        return $this->only('email', 'password');
    }

    private function isEmail($param)
    {
        $factory = $this->container->make(ValidationFactory::class);
        //it will check if there is error or none
        return !$factory->make(['email' => $param], ['email' => 'email'])->fails();
    }
}
