<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class AppBaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public abstract function rules(): array;
}
