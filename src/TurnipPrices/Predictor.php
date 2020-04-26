<?php

namespace Rozeo\ACNH\TurnipPrices;

class Predictor
{
    /**
     * @var int|null
     */
    private ?int $basePrice;

    /**
     * @var int|null
     */
    private ?int $prevWeekType;

    /**
     * @var bool
     */
    private bool $firstBuy;

    /**
     * @var array<array<int, int>>
     */
    private array $values;

    public function __construct(
        ?int $basePrice = null,
        bool $firstBuy = false,
        ?int $prevWeekType = null
    )
    {
        $this->basePrice = $basePrice;
        $this->firstBuy = $firstBuy;
        $this->prevWeekType = $prevWeekType;
    }

    public function setBasePrice(int $price) {
        $this->basePrice = $price;
        return $this;
    }

    public function setFirstBuy(bool $firstBuy) {
        $this->firstBuy = $firstBuy;
        return $this;
    }

    /**
     * @param int $type Rozeo\ACNH\TurnipPrices\Types
     */
    public function setPrevWeekType(int $type) {
        $this->prevWeekType = $type;
        return $this;
    }

    public function setWeekValues(array $values) {
        $this->values = $values;
        return $this;
    }

    public function predict()
    {
        (new Calculator($this->basePrice, $this->firstBuy, $this->prevWeekType))
            ->getPetterns();
    }
}