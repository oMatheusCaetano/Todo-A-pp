<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends BaseController
{
    protected string $modelClass = Todo::class;
    protected string $updateRequest = TodoRequest::class;
    protected string $storeRequest = TodoRequest::class;
}
