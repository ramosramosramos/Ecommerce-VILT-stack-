<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'parent_id',
        'name',
        'description',
        'slug',
        'status',
    ];

    public function product(){
        return  $this->hasMany(Product::class);
    }
}
