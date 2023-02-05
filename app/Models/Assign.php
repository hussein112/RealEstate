<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory;

    protected $table = 'assign';

    public function assignedTo(){
        return $this->belongsTo(Employee::class);
    }

    public function details(){
        return $this->belongsTo(Valuation::class);
    }

    public function assignedBy(){
        return $this->belongsTo(Admin::class);
    }
}
