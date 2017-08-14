<?php

namespace PortfolioBundle\Composer;

use Composer\Script\Event;
use Composer\Util\ProcessExecutor;

/**
 * Basic handler for yarn, simple pass-through at this point.
 *
 * @package PortfolioBundle\Composer
 */
class YarnHandler
{
    public static function postInstall(Event $event)
    {
        $command = 'yarn install';

        if (!$event->isDevMode()) {
            $command .= ' --production';
        }

        static::executeCommand($event, $command);
        static::buildAssets($event);
    }

    public static function postUpdate(Event $event)
    {
        $command = 'yarn upgrade';

        if (!$event->isDevMode()) {
            $command .= ' --production';
        }

        static::executeCommand($event, $command);
        static::buildAssets($event);
    }

    private static function buildAssets(Event $event)
    {
        $command = './node_modules/.bin/encore ';
        $command .= ($event->isDevMode())? 'dev' : 'production';

        static::executeCommand($event, $command);
    }

    private static function executeCommand(Event $event, $command)
    {
        $processExecutor = new ProcessExecutor($event->getIO());
        return $processExecutor->execute($command);
    }
}