<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperRestoArea
 */
class RestoArea extends Model
{
    public $table = 'restoareas';
    protected $fillable = [
        'name', 'restaurant_id', 'user_id',
    ];

    public function tables()
    {
        return $this->hasMany(\App\Tables::class, 'restoarea_id', 'id');
    }



    public function restorant()
    {
        return $this->belongsTo(\App\Restorant::class,'restaurant_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
