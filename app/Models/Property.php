<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'property';

    public function propertyGroup(){
        return $this->hasMany(User::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function features(){
        return $this->belongsToMany(Feature::class, 'property_feature', 'property_id', 'feature_id');
    }

    public function images(){
        return $this->belongsToMany(Image::class, 'property_image', 'property_id', 'image_id');
    }

    public function addedBy(){
        return $this->belongsTo(Admin::class);
    }

    public function appointements(){
        return $this->hasMany(Appointement::class);
    }
}
