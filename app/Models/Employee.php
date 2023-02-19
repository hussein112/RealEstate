<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Employee extends Authenticatable
{
    use Notifiable, HasFactory, Sortable;

    protected $table = 'team_member';
    public $timestamps = false;
    protected $guarded = ['id'];
    public $sortable = [
        'id',
        'full_name',
        'statement',
        'phone',
        'email',
        'admin_id',
    ];

    public function addedBy(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function avatar(){
        return $this->belongsTo(Image::class);
    }

    public function appointements(){
        return $this->hasMany(Appointement::class);
    }

    public function valuation(){
        return $this->hasMany(Valuation::class);
    }
}
