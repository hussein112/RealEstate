<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Property extends Model
{
    use HasFactory, Sortable;

    public $sortable = [
        'id',
        'size',
        'title',
        'description',
        'featured',
        'price',
        'location',
        'bedrooms_nb',
        'bathrooms_nb',
        'date_posted',
        'admin_id',
        'type_id',
        'for',
        'customer_id'
    ];

    protected $table = 'property';
    protected $guarded = ['id'];

    public function propertyGroup(){
        return $this->hasMany(User::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function owner(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function features(){
        return $this->belongsToMany(Feature::class, 'property_features', 'property_id', 'feature_id');
    }

    public function images(){
        return $this->belongsToMany(Image::class, 'property_image', 'property_id', 'image_id');
    }

    public function addedBy(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function appointements(){
        return $this->hasMany(Appointement::class);
    }

    public function enquiries(){
        return $this->hasMany(Enquiry::class);
    }
}
