<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'reservation_date',
        'seats',
        'total',
        'pay_method',
        'route_id',
    ];

    public function travelDates()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }
}
