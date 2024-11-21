<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Client extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'id',
        'name',
        'address',
        'phone_number',
        'email',
        'password',
        'created_at',
        'updated_at'
    ];

    protected $cast = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $hidden = [
        'password'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
