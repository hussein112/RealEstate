<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;

    protected $table = "user";
    protected $guarded = ['id'];
    public $sortable = [
        'id',
        'f_name',
        'phone',
        'email',
        'admin_id',
        'email_verified_at',
        'joined_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function avatar(){
        return $this->belongsTo(Image::class);
    }

    public function addedBy(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function addedByEmployee(){
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }


    public function favoriteList(){
        return $this->hasMany(FavoriteList::class);
    }
}
