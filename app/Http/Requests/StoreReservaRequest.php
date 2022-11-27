<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "id_table" => ["required"],
            "id_user" => ["required"],
            "is_confirmed" => ["required"],
        ];
    }
}