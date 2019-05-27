<?php

namespace Retrospekt\LaravelClient;

use Monolog\Handler\AbstractProcessingHandler;

class RetrospektHandler extends AbstractProcessingHandler
{
    /**
     * Sends the log message to Retrospekt.
     *
     * @param array $record
     */
    public function write(array $record)
    {
        dd('record being sent:', $record);

        // TODO: do the cURL stuff to send the log message. Perhaps use adapters so the user is able to configure which
        // driver they want to use. sync, async, etc.
    }
}
