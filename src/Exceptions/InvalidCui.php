<?php

namespace Andali\Anaf\Exceptions;

use Exception;

class InvalidCui extends Exception
{
    public static function invalid(): self
    {
        return new static('The CUI is invalid');
    }
}
