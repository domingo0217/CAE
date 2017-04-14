<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = [];
    public $incrementing = false;

    public function telephone()
    {
        return $this->hasMany(Telephone::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function delegation()
    {
        return $this->belongsTo(Delegation::class);
    }

    public function document()
    {
        return $this->belongsToMany(Document::class);
    }

    public function charge()
    {
        return $this->belongsToMany(Charge::Class)->withTimestamps();
    }

    public function capacitation()
    {
        return $this->belongsToMany(Capacitation::class)->withTimestamps();
    }
}
