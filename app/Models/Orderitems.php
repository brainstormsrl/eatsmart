<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

/**
 * @mixin IdeHelperOrderitems
 */
class Orderitems extends Posts
{
    protected $table="order_has_items";
}
