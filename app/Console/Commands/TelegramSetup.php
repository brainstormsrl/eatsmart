<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TelegramSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:webhook {bot_name} {--setup}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comanda de configurare a webhook-ului Telegram';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bot_name = $this->argument('bot_name');
        dd($bot_name);
        return 0;
    }
}
