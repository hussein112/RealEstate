<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
{
    use HasFactory, Sortable;

    protected $table = 'customer';
    public $timestamps = false;
    protected $guarded = ['id'];
    public $sortable = [
        'id',
        'full_name',
        'email',
        'phone',
        'admin_id'
    ];

    public function properties(){
        return $this->hasMany(Property::class);
    }

    public function addedBy(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}
