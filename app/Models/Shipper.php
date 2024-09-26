<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipper extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'tracking_url',
        'status',
    ];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
