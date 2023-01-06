<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperStatus
 */
class Status extends Model
{
    protected $table = 'status';
    public $timestamps = false;
    protected $fillable = [
        'name', 'alias',
    ];
}
