<?php


namespace Rozeo\ACNH\TurnipPrices\PriceGenerator;


interface GeneratorInterface
{
    public function __construct(int $basePrice);

    public function generate(): array;
}