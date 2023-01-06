<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

class StartCommand extends Command
{

    /**
     * @var string Command Name
     */
    protected $name = "start";

    /**
     * @var string Command Description
     */
    protected $description = "Start Command to get you started";

    /**
     * @inheritDoc
     */
    public function handle()
    {
        $button = Keyboard::button([
            "text" => "Share Contact",
            "request_contact" => true
        ]);

        $keyboard = Keyboard::make([
            'keyboard' => [[$button]],
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);
        $this->replyWithMessage(['text' => "Please share your contact", 'reply_markup' => $keyboard]);
    }
}
