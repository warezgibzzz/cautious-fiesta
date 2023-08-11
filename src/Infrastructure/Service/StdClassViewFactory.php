<?php

declare(strict_types=1);

namespace App\Infrastructure\Service;

use App\Infrastructure\View\ViewInterface;
use IteratorAggregate;

class StdClassViewFactory extends AbstractViewFactory
{
    private IteratorAggregate $taggedViews;

    private ?ViewFilter $viewFilter;
    public function __construct(IteratorAggregate $taggedViews)
    {
        $this->taggedViews = $taggedViews;
    }

    public function render(string $fqdn, mixed $data, array $options = []): ViewInterface
    {
        $filter = new ViewFilter($this->taggedViews->getIterator());
        $filter->setFilter($fqdn);
        $this->setViewFilter($filter);

        if (!$this->findInTaggedViews($fqdn)) {
            throw new \LogicException(
                'We found the class, bud did you forget to implement ViewInterface in it?'
            );
        }

        /** @var ViewInterface $view */
        $view = $fqdn;

        if (!$view::supports($data)) {
            throw new \BadMethodCallException('Dta is not supported by view');
        }

        return new $view($data);
    }

    private function findInTaggedViews($fqdn): bool
    {
        $found = false;
        foreach ($this->viewFilter->getInnerIterator() as $item) {
            if ($item instanceof $fqdn) {
                $found = true;
                break;
            }
        }
        return $found;
    }

    /**
     * @param \App\Infrastructure\Service\ViewFilter|null $viewFilter
     */
    public function setViewFilter(?ViewFilter $viewFilter): void
    {
        $this->viewFilter = $viewFilter;
    }

}