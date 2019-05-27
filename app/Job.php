<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function in_need_user()
    {
        return $this->belongsto('App\InNeedUser', 'job_id');
    };

}
