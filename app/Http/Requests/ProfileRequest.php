<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => ['required', Rule::unique('users', 'username')->ignore($this->user->id)],
            'email' => "email|required",
            'password' => 'sometimes',
            'image' => 'sometimes'
        ];
    }

    protected function prepareForValidation()
    {
        if($this->password === null){
            $this->request->remove('password');
        }

        if($this->image === null){
            $this->request->remove('image');
        }
    }
}
