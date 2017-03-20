<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['docmuent', 'confirmed'];

    public function member()
    {
        return $this->belongsToMany(Member::class);
    }
}
