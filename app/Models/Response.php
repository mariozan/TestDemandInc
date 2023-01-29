<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $table = 'response';
    protected $primaryKey = 'id';
    protected $fillable = ["text", "image", "user_id", "blog_id"];
}
