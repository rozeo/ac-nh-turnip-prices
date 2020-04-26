<?php


namespace Rozeo\ACNH\TurnipPrices;


class Probability
{
    const VALUE = [
        Types::FLUCTUATING => [
            Types::FLUCTUATING => 0.20,
            Types::LARGE_SPIKE => 0.30,
            Types::DECREASING => 0.15,
            Types::SMALL_SPIKE => 0.35,
        ],

        Types::LARGE_SPIKE => [
            Types::FLUCTUATING => 0.50,
            Types::LARGE_SPIKE => 0.05,
            Types::DECREASING => 0.20,
            Types::SMALL_SPIKE => 0.25,
        ],

        Types::DECREASING => [
            Types::FLUCTUATING => 0.25,
            Types::LARGE_SPIKE => 0.45,
            Types::DECREASING => 0.05,
            Types::SMALL_SPIKE => 0.25,
        ],

        Types::SMALL_SPIKE => [
            Types::FLUCTUATING => 0.45,
            Types::LARGE_SPIKE => 0.25,
            Types::DECREASING => 0.15,
            Types::SMALL_SPIKE => 0.15,
        ]
    ];

}