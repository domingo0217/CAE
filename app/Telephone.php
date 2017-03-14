<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $fillable = ['telephone'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
