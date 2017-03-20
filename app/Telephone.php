<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $fillable = ['telephone', 'member_id'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
