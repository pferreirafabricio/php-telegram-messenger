<?php

declare(strict_types=1);

namespace Source\App;

use TelegramBot\Api\BotApi;

class Notify
{
    /**
     * Send an alert message
     *
     * @param string $message
     * @return bool
     */
    public function sendAlertMessage(string $message): bool
    {
        $botApi = new BotApi($_ENV['CONF_TELEGRAM_BOT_TOKEN']);
        
        try {
            $botApi->sendMessage($_ENV['CONF_TELEGRAM_CHAT_ID'], $message);

            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
