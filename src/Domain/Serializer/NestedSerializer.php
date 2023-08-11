<?php

declare(strict_types=1);

namespace App\Domain\Serializer;

class NestedSerializer
{
    public string $test;


    public function __construct(string $test)
    {
        $this->test = $test;
    }

    /**
     * @return string
     */
    public function getTest(): string
    {
        return $this->test;
    }

    /**
     * @param string $test
     */
    public function setTest(string $test): void
    {
        $this->test = $test;
    }
}