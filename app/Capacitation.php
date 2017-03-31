<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Capacitation extends Model
{
    protected $guarded = ['id'];

    public function member()
    {
        return $this->belongsToMany(Member::class);
    }
}
