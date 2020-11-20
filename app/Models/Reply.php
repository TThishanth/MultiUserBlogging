<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory; 

    protected $table = "replies";

    protected $fillable = ['blog_id', 'comment_id', 'owner_id', 'owner_name', 'body'];
}
