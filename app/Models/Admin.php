<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Admin extends Authenticatable
{
    use Notifiable, Sortable;

    public $sortable = [
        'id',
        'f_name',
        'email',
        'email_verified_at'
    ];
    protected $table = 'admin';
    public $timestamps = false;

    protected $guarded = ['id'];


    public function avatar(){
        return $this->belongsTo(Image::class);
    }

    public function addedUser(){
        return $this->hasMany(User::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function addedProperties(){
        return $this->hasMany(Property::class);
    }

    public function addedCustomer(){
        return $this->hasMany(Customer::class);
    }

    public function assignedAppointements(){
        return $this->hasMany(Appointement::class);
    }


    public function assignedValuations(){
        return $this->hasMany(Valuation::class);
    }

    public function addedEmployees(){
        return $this->hasMany(Employee::class);
    }
}
