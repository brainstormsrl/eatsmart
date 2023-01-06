<?php

namespace App\Http\Controllers;

use App\Models\TelegramUser;
use App\User;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function index()
    {
        $webhook = Telegram::commandsHandler(true);
        $message = $webhook->getMessage();

        if ($message->isType('contact')) {
            $user = User::where('phone', 'like', $message->contact->phoneNumber)->first();
            if ($user) {
                $telegramUser = TelegramUser::updateOrCreate([
                    'user_id' => $user->id,
                    'chat_id' => $message->contact->userId,
                    'phone_number' => $message->contact->phoneNumber,
                    'first_name' => $message->contact->firstName,
                    'last_name' => $message->contact->lastName
                ]);
                Telegram::sendMessage([
                    'chat_id' => $message->contact->userId,
                    'text' => 'Successfully registration'
                ]);
            } else {
                Telegram::sendMessage([
                    'chat_id' => $message->contact->userId,
                    'text' => 'Please register to system after access the bot'
                ]);
            }
        }
    }
}
