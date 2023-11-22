<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Throwable;

class DataServiceModelNotSet extends Exception
{
    public function __construct(object $service, int $code = 0, ?Throwable $previous = null)
    {
        $class = get_class($service);

        $message = "No model defined for {$class}";

        parent::__construct($message, $code, $previous);
    }
}
