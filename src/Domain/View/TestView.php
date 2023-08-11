<?php

declare(strict_types=1);

namespace App\Domain\View;

use App\Infrastructure\View\ViewInterface;

class TestView implements ViewInterface
{
    private $data;
    public function __construct(array $data = [])
    {
        $this->data = $data;

    }

    public static function supports(mixed $data): bool
    {
        return $data instanceof \iterable;
    }

    public function jsonSerialize(): array
    {
        return $this->data;
    }
}