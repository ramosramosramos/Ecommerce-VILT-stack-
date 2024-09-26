<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'expiry_month',
        'expiry_year',
        'is_primary',
    ];
    protected $casts = [
        'card_number' => 'encrypted',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
