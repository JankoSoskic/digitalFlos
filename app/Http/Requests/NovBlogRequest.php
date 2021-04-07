<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NovBlogRequest extends FormRequest
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
            "naslov"=>["regex:/^[A-zŠĐĆČđšćč]+(?: [A-zŠĐĆČđšćč]+)+$/"],
            "slika"=>"required|image|mimes:jpeg,png,jpg|max:8048",
            "textArea"=>"min:15",
        ];
    }
}
