<?php


namespace Rozeo\ACNH\TurnipPrices\PriceGenerator;


use Rozeo\ACNH\TurnipPrices\Types;

class PriceGeneratorFactory
{
    public static function generate(int $type, int $basePrice): array
    {
        $className = '';
        switch ($type) {
            case Types::FLUCTUATING:
                $className = Fluctuating::class;
                break;

            case Types::LARGE_SPIKE:
                $className = LargeSpike::class;
                break;

            case Types::DECREASING:
                $className = Descreasing::class;
                break;

            case Types::SMALL_SPIKE:
                $className = SmallSpike::class;
                break;

            default:

        }

        return (new $className($basePrice))->generate();
    }
}