<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "image";

    public function adminAvatar(){
        return $this->hasOne(Admin::class);
    }

    public function userAvatar(){
        return $this->hasOne(User::class);
    }

    public function postImages(){
        return $this->belongsToMany(Post::class, 'post_image', 'image_id', 'post_id');
    }

    public function propertyImage(){
        return $this->belongsToMany(Property::class, 'property_image', 'image_id', 'property_id');
    }
}
