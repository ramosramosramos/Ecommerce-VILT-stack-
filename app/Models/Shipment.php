<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'tracking_number',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }
}
