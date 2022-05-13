<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'code_booking', 'name', 'email', 'phone', 'duration', 'total_price', 'date_start', 'date_end', 'status'];
    protected $dates = [
        'date_start',
        'date_end',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
