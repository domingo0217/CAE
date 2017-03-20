<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = ['charge'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
