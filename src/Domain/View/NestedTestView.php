<?php

declare(strict_types=1);

namespace App\Domain\View;

use App\Infrastructure\View\ViewInterface;

class NestedTestView implements ViewInterface
{

    public static function supports(mixed $data): bool
    {
        return true;
    }

    public function jsonSerialize(): array
    {
        return [
            'nested' => true
        ];
    }
}