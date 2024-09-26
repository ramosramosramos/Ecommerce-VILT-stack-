<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'role',
        'isAuthorizedSeller',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }
}
