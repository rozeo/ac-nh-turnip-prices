<?php


namespace Rozeo\ACNH\TurnipPrices\PriceGenerator;


class Pattern
{
    private float $probability;
    private array $pattern;

    public function __construct(float $probability, array $pattern)
    {
        $this->probability = $probability;
        $this->pattern = $pattern;
    }

    /**
    * @return float
    */
    public function getProbability(): float
    {
        return $this->probability;
    }

    /**
     * @return array
     */
    public function getPattern(): array
    {
        return $this->pattern;
    }
}