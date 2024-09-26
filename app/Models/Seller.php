<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_name',
        'payment_method',
        'discount_type',
        'discount_available',
        'type_goods',
        'current_order',
        'logo',
    ];

    public function role(){
        return $this->belongsTo(UserRole::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function shippers()
    {
        return $this->hasMany(Shipper::class);
    }
    public function siteLinks()
    {
        return $this->hasMany(SiteLink::class);
    }

}
