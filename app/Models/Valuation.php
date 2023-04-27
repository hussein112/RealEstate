<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use App\Notifications\ValuationRequested;

class Valuation extends Model
{
    use HasFactory, Sortable, Notifiable;

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
    public $guarded = ['id'];

    public function requestedForValuation(){
        return $this->hasMany(Valuation::class);
    }

    public function assignedBy(){
        return $this->belongsTo(Admin::class);
    }
}
