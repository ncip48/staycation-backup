<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $table = 'site';
    protected $fillable = ['name', 'address', 'phone', 'phone2', 'email', 'email2', 'facebook', 'twitter', 'instagram', 'whatsapp', 'description', 'logo', 'favicon', 'about', 'open', 'close'];
}
