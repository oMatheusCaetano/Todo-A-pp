<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'done', 'user_id'];

    public function getDoneAttribute(bool $value): bool
    {
        return $value;
    }
}
