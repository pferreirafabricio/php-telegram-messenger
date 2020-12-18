<?php

declare(strict_types=1);

namespace Source\App;

class Notify
{
    public function getAllEnvironments()
    {
        return $_ENV['CONF_TELEGRAM_BOT_TOKEN'];
    }
}
