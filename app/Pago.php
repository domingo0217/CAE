<?php

namespace cae;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'monto','fecha_pago', 
    ];

    public function member()
    {
        return $this->belongsTo(member::class);
    }

}
 