<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['document'];

    public function member()
    {
        return $this->belongsToMany(Member::class)->withPivot('confirmed')->withTimestamps();
    }
}
