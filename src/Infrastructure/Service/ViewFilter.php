<?php

declare(strict_types=1);

namespace App\Infrastructure\Service;

use Iterator;

class ViewFilter extends \FilterIterator
{
    private string $filter;

    public function __construct(\Iterator|\Traversable $iterator)
    {
        parent::__construct($iterator);
    }

    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
    }

    public function accept(): bool
    {
        $view = $this->getInnerIterator()->current();

        return $view instanceof $this->filter;
    }
}