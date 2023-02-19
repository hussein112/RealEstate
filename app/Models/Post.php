<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use HasFactory, Sortable;

    public $sortable = [
        'id',
        'date_posted',
        'title',
        'content',
        'category_id',
        'admin_id'
    ];

    protected $table = 'post';

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(Admin::class);
    }

    public function images(){
        return $this->belongsToMany(Image::class, 'post_images', 'post_id', 'image_id');
    }
}
