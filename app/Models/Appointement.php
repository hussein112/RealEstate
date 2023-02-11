<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointement extends Model
{
    use HasFactory;

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
