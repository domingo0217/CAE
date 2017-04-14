<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    protected $fillable = ['document'];
    protected $dates = ['deleted_at'];

    public function member()
    {
        return $this->belongsToMany(Member::class)->withPivot('confirmed')->withTimestamps();
    }
}
