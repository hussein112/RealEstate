<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteList extends Model
{
    use HasFactory;

    protected $table = 'favorite_list';

    protected $guarded = ['id'];

    public function owner(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
}
