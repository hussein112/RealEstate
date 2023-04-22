<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Enquiry extends Model
{
    use HasFactory, Sortable;

    public $sortable = [
        'id',
        'date_issued',
        'issuer_name',
        'issuer_email',
        'issuer_phone',
        'employee_id',
        'property_id'
    ];

    protected $table = 'enquiry';

    protected $guarded = ['id'];


    public function purpose(){
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
}
