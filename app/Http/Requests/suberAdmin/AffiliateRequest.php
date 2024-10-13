<?php

namespace App\Http\Requests\suberAdmin;

use Illuminate\Foundation\Http\FormRequest;

class AffiliateRequest extends FormRequest
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
            // This Is Validation All Request For Affiliate Add 
               'name'=>'required',
               'email'=>'required',
               'password'=>'required',
               'phone'=>'required',
               'identity'=>'required',
               'image'=>'required',
        ];
    }
}
