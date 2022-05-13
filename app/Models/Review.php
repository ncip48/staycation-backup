<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'user_id', 'r0', 'r1', 'r2', 'r3', 'r4', 'total_rating', 'comment'];
}
