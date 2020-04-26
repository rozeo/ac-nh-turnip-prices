<?php


namespace Rozeo\ACNH\TurnipPrices\PriceGenerator;


trait PriceGeneratorTrait
{
    private function getIndividualValue(
        int $price,
        array $prices,
        int $start,
        int $length,
        float $rateMin,
        float $rateMax
    ) {

        for ($i = $start; $start < $start + $length; ++$i) {
            $min = $price * $rateMin;
            $max = $price * $rateMax;

            $prices[$i] = [$min, $max];
        }
        return $prices;
    }

    private function getDecreasingValue(
        int $price,
        array $prices,
        int $start,
        int $length,
        float $rateMin,
        float $rateMax,
        float $decayMin,
        float $decayMax
    ) {

    }
}