<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'transaction_id',
        'total_amount',
        'status',
        'ship_date',
    ];

    public function customer(){
        return $this->belongsTo(User::class);
    }
    public function shipper(){
        return $this->belongsTo(Shipper::class);
    }
    public function shippers(){
        return $this->hasMany(Shipper::class);
    }
    public function shipments(){
        return $this->hasMany(Shipment::class);
    }
}
