<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function date_start_parse()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->date_start)->locale('id')->isoFormat('dddd, D MMM Y');
    }

    public function date_end_parse()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->date_end)->locale('id')->isoFormat('dddd, D MMM Y');
    }

    public function create_parse()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->locale('id')->isoFormat('dddd, D MMM Y');
    }
}
