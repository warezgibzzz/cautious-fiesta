<?php

declare(strict_types=1);

namespace App\Infrastructure\View;

interface ViewInterface extends \JsonSerializable
{
    public static function supports(mixed $data): bool;
}