<?php

declare(strict_types=1);

namespace App\Domain\Serializer;

class TestSerializer
{
    private bool $test;
    private int $int;
    private string $string;
    private float $float;
    private object $object;
    private iterable $array;
    private mixed $nested;

    public function __construct(
        bool $test,
        int $int,
        string $string,
        float $float,
        object $object,
        iterable $array,
        mixed $nested
    )
    {
        $this->test = $test;
        $this->int = $int;
        $this->string = $string;
        $this->float = $float;
        $this->object = $object;
        $this->array = $array;
        $this->nested = $nested;
    }

    /**
     * @return bool
     */
    public function isTest(): bool
    {
        return $this->test;
    }

    /**
     * @param bool $test
     */
    public function setTest(bool $test): void
    {
        $this->test = $test;
    }

    /**
     * @return int
     */
    public function getInt(): int
    {
        return $this->int;
    }

    /**
     * @param int $int
     */
    public function setInt(int $int): void
    {
        $this->int = $int;
    }

    /**
     * @return string
     */
    public function getString(): string
    {
        return $this->string;
    }

    /**
     * @param string $string
     */
    public function setString(string $string): void
    {
        $this->string = $string;
    }

    /**
     * @return float
     */
    public function getFloat(): float
    {
        return $this->float;
    }

    /**
     * @param float $float
     */
    public function setFloat(float $float): void
    {
        $this->float = $float;
    }

    /**
     * @return object
     */
    public function getObject(): object
    {
        return $this->object;
    }

    /**
     * @param object $object
     */
    public function setObject(object $object): void
    {
        $this->object = $object;
    }

    /**
     * @return iterable
     */
    public function getArray(): iterable
    {
        return $this->array;
    }

    /**
     * @param iterable $array
     */
    public function setArray(iterable $array): void
    {
        $this->array = $array;
    }

    /**
     * @return mixed
     */
    public function getNested(): mixed
    {
        return $this->nested;
    }

    /**
     * @param mixed $nested
     */
    public function setNested(mixed $nested): void
    {
        $this->nested = $nested;
    }
}