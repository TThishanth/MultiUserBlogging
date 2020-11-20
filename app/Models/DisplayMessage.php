<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisplayMessage extends Model
{
    use HasFactory;

    protected $table = "display_messages";

    protected $fillable = ['body'];
}
