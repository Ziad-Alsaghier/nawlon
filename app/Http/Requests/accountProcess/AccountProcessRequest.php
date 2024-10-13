<?php

namespace App\Http\Requests\accountProcess;

use Illuminate\Foundation\Http\FormRequest;

class AccountProcessRequest extends FormRequest
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
            // This eturn Mony Withdraw or Deposit or sale
            'money'=>'required',
        ];
    }
}
