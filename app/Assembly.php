<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
    protected $fillable = ['date', 'record', 'assembly'];

    public function member()
    {
        return $this->belongsToMany(Member::class)->withTimestamps();
    }

    public function topic()
    {
        return $this->hasMany(Topic::class);
    }
}
