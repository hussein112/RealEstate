<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'type';

    public function property(){
        return $this->hasMany(Property::class);
    }

    public function advertise(){
        return $this->hasMany(Advertise::class);
    }
}
