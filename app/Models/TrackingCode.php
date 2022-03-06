<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingCode extends Model
{
    protected $table = 'tracking_codes';
    protected $fillable = ['tracking_code'];
}
