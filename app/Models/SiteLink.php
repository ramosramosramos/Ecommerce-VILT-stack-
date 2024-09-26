<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'link'
    ];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }
}
