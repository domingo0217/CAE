<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['address'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function city()
    {
        return $this->hasOne(City::class);
    }
}
