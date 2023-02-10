<?php

namespace App\Custom;

use Carbon\Carbon;

trait DateQueries{

    public function pastWeek($week = 1){
        return Carbon::now()->add(-$week, 'week');
    }

}
