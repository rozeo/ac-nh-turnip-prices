<?php


namespace Rozeo\ACNH\TurnipPrices\PriceGenerator;


class PDF
{
    private float $min;
    private float $max;
    private array $prob;

    public function __construct(float $min, float $max, bool $uniform = true)
    {
        $this->min = min($min, $max) * 10000;
        $this->max = max($min, $max) * 10000;
        $this->prob = array_fill(0, $this->max - $this->min + 1, 0);

        if ($uniform) {
            $this->uniform();
        }
    }

    public function uniform() {
        $total = $this->max - $this->min;
        foreach ($this->prob as $index => $p) {

        }
    }

    public function min()
    {
        return $this->min - 0.5;
    }

    public function max()
    {
        return $this->max + 0.5 - 1e-9;
    }

    public function normalize()
    {
        $reduced = array_reduce(
            $this->prob,
            fn ($carry, $cur) => $carry + $cur,
            0
        );

        foreach ($this->prob as $index => $p) {
            $this->prob[$index] /= $reduced;
        }
    }

    public function decay()
    {

    }
}