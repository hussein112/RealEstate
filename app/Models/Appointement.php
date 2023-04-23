<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Appointement extends Model
{
    use HasFactory, Sortable;

    public $sortable = [
        'id',
        'title',
        'date',
        'issuer_name',
        'issuer_phone',
        'admin_id',
        'employee_id',
        'property_id'
    ];

    protected $table = 'appointement';

    public $guarded = ['id'];

    public function forEmployee(){
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function forAdmin(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function purpose(){
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }

}
