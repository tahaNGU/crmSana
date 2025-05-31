<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Task\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        "title"
    ];

}
