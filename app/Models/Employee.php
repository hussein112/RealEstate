<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $table = 'team_member';
    public $timestamps = false;

    public function addedBy(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function appointements(){
        return $this->hasMany(Appointement::class);
    }

    public function valuation(){
        return $this->hasMany(Valuation::class);
    }
}
