<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valuation extends Model
{
    use HasFactory;

    protected $table = 'valuation';

    public function requestedForValuation(){
        return $this->hasMany(Valuation::class);
    }

    public function assignedBy(){
        return $this->belongsTo(Admin::class);
    }
}
