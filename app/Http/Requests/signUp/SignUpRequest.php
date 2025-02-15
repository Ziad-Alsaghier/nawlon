<?php

namespace App\Http\Requests\signUp;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // This Is About All Data Request From Add New Campany 
              'name'=>'required',
              'email'=>'required',
              'phone'=>'required',
              'parent_phone'=>'required',
              'password'=>'required',
              'package_id'=>'required',
              'logoImage'=>'required',
              'image'=>'required',
        ];
    }
}
