<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $table = 'team_member';

    public function appointements(){
        return $this->hasMany(Appointement::class);
    }

    public function valuation(){
        return $this->hasMany(Valuation::class);
    }
}
