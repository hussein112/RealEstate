<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;
    protected $table = 'feature';

    public function property(){
        return $this->belongsToMany(Property::class, 'property_feature', 'feature_id', 'property_id');
    }
}
