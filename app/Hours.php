<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperHours
 */
class Hours extends Model
{
    protected $table = 'hours';

    public function restorant()
    {
        return $this->belongsTo(\App\Restorant::class);
    }
}
