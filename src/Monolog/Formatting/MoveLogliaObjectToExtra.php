<?php

namespace Loglia\LaravelClient\Monolog\Formatting;

class MoveLogliaObjectToExtra implements Formatter
{
    /**
     * @inheritdoc
     */
    public function __invoke(array $record)
    {
        if ($this->recordHasLogliaObject($record)) {
            return $this->moveLogliaObjectToExtra($record);
        }

        return $record;
    }

    /**
     * Determines if the record has an exception in its context data.
     *
     * @param array $record
     * @return bool
     */
    private function recordHasLogliaObject(array $record)
    {
        if (empty($record['context']['__loglia'])) {
            return false;
        }

        return true;
    }

    /**
     * Moves an exception from the context data to the extra data.
     *
     * @param array $record
     * @return array
     */
    private function moveLogliaObjectToExtra(array $record)
    {
        $record['extra']['__loglia'] = $record['context']['__loglia'];

        unset($record['context']['__loglia']);

        return $record;
    }
}
