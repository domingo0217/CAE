<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = ['id'];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
