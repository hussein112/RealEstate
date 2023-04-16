<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValuationApproval extends Model
{
    use HasFactory;

    protected $table = 'valuation_approval';

    protected $guarded = ['id'];
}
