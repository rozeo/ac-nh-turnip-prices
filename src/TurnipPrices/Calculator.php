<?php


namespace Rozeo\ACNH\TurnipPrices;


use Rozeo\ACNH\TurnipPrices\PriceGenerator\Pattern;
use Rozeo\ACNH\TurnipPrices\PriceGenerator\PriceGeneratorFactory;

class Calculator
{
    private int $basePrice;
    private bool $firstBuy;
    private int $prevWeekType;
    private $patterns;

    public function __construct(
        int $basePrice,
        bool $firstBuy,
        int $prevWeekType
    )
    {
        $this->basePrice = $basePrice;
        $this->firstBuy = $firstBuy;
        $this->prevWeekType = $prevWeekType;

        $this->generatePatterns();
    }

    private function generatePatterns()
    {
        if ($this->firstBuy) {
            $this->patterns[] = new Pattern(
                100,
                PriceGeneratorFactory::generate(
                    Types::SMALL_SPIKE,
                    $this->basePrice
                )
            );

        } else {
            foreach ([
                Types::FLUCTUATING,
                Types::LARGE_SPIKE,
                Types::DECREASING,
                Types::SMALL_SPIKE
                     ] as $type) {

                $this->patterns[] = new Pattern(
                    Probability::VALUE[$this->prevWeekType][$type],
                    PriceGeneratorFactory::generate(
                        $type,
                        $this->basePrice
                    )
                );
            }
        }
    }
}