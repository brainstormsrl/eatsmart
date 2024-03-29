<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasConfig;

/**
 * @mixin IdeHelperCartStorageModel
 */
class CartStorageModel extends Model
{
    use HasFactory;
    use HasConfig;

    protected $modelName="App\Models\CartStorageModel";

    protected $table = 'cart_storage';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'cart_data','vendor_id','user_id','type','receipt_number',
    ];

    public function vendor()
    {
        return $this->belongsTo(\App\Restorant::class,'id','vendor_id');
    }

    public function user()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }

    public function setCartDataAttribute($value)
    {
        $this->attributes['cart_data'] = serialize($value);
    }

    public function getCartDataAttribute($value)
    {
        return unserialize($value);
    }
    
}
