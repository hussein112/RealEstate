<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'list';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function properties(){
        return $this->belongsToMany(Property::class);
    }
}
