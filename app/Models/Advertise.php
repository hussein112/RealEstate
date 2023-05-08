<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    use HasFactory;

    protected $table = 'advertise';
    protected $guarded = ['id'];
    public $sortable = [
        'id',
        'full_name',
        'phone',
        'email',
        'location',
        'for'
    ];


    public function type(){
        return $this->belongsTo(Type::class);
    }


    public function assignedTo(){
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
