<?php

namespace App\Http\Requests;

class TodoRequest extends AppBaseRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'user_id' => 'required|int|exists:users,id',
            'description' => 'nullable|string|max:255',
            'done' => 'nullable|boolean',
        ];
    }
}
