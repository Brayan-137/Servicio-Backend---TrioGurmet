<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'description',
        'category',
        'image_url',
        'price',
        'created_at',
        'updated_at'
    ];

    protected $cast = [
        'price' => 'double',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
