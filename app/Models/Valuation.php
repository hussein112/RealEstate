<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Valuation extends Model
{
    use HasFactory, Sortable;

    public $sortable = [
        'id',
        'date_issued',
        'issuer_fname',
        'issuer_phone',
        'city',
        'furnishing_status',
        'garage',
        'bedrooms_nb',
        'bathrooms_nb',
        'valuation_type',
        'valuation_status',
        'due_date'
    ];
    protected $table = 'valuation';
    public $timestamps = false;
    public $guarded = ['id'];

    public function requestedForValuation(){
        return $this->hasMany(Valuation::class);
    }

    public function assignedBy(){
        return $this->belongsTo(Admin::class);
    }
}
