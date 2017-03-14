<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Delegation extends Model
{
    protected $fillable = ['delegation'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
