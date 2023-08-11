<?php

declare(strict_types=1);

namespace App\Infrastructure\Service;

use App\Infrastructure\View\ViewInterface;

abstract class AbstractViewFactory
{
    abstract public function render(string $fqdn, mixed $data, array $options = []): ViewInterface;
}