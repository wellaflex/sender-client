<?php

namespace Sender\Exception;

class ReceiversWasNotSpecified extends \Exception
{
    public function __construct()
    {
        parent::__construct("Receiver was not specified");
    }
}