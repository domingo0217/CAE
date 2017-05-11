<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Cellphone extends Model
{
    protected $fillable = ['cellphone', 'member_id'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
