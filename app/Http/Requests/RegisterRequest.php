<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "ime"=>["regex:/^[A-ZĐŠĆČ][a-zšđćč]{2,14}$/"],
            "prezime"=>["regex:/^[A-ZĐŠĆČ][a-zšđćč]{3,14}$/"],
            "lozinka"=>["regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/"],
            "email"=>["regex:/^[A-z\d.\.]{2,18}@(hotmail|gmail)\.(com|rs)$/"]
        ];
    }
}
