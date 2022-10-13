<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;


    protected $table = 'cars';

    protected $fillable = [
        'user_id',
        'brand',
    ];

    protected $casts = [
        'brand' => 'string',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'car_users','car_id','user_id');
    }
}
