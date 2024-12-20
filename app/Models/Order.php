<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'status',
        'client_id',
        'created_at',
        'updated_at'
    ];

    protected $cast = [
        'client_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withPivot(['quantity']);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
