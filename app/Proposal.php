<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $guarded = [];

    public function job(){
        return $this->belongsTo(Job::class, 'job_id');
    }

}
