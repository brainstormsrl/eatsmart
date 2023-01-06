<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperTelegramUser
 */
class TelegramUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'chat_id', 'first_name', 'last_name', 'phone_number'];
}
