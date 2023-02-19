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

    public $timestamps = false;

    public function assignedTo(){
        return $this->belongsTo(Employee::class);
    }

    public function assignedBy(){
        return $this->belongsTo(Admin::class);
    }

    public function purpose(){
        return $this->belongsTo(Property::class);
    }

}
