<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $guarded = ['id'];

    public function member()
    {
        return $this->belongsToMany(Member::class)->withPivot('vote')->withTimestamps();
    }

    public function assembly()
    {
        return $this->belongsTo(Assembly::class);
    }
}
