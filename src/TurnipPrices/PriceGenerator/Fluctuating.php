<?php


namespace Rozeo\ACNH\TurnipPrices\PriceGenerator;


class Fluctuating implements GeneratorInterface
{
    use PriceGeneratorTrait;

    private int $price;
    /**
     * @var int[][]
     */
    private array $predictedPrices;

    public function __construct(int $basePrice)
    {
        $this->price = $basePrice;
    }

    public function generate(): Generator
    {
        for ($p1 = 2; $p1 < 4; ++$p1) {
            for ($p2 = 0; $p2 < 7; ++$p2) {
                for ($p3 = 0; $p3 < (7 - $p2 - 1 + 1); ++$p3) {
                    yield* this.multiply_generator_probability(
                        this.generate_pattern_0_with_lengths(given_prices, high_phase_1_len, dec_phase_1_len, 7 - high_phase_1_len - high_phase_3_len, 5 - dec_phase_1_len, high_phase_3_len),
                        1 / (4 - 2) / 7 / (7 - high_phase_1_len));
                }
          }
        }
    }

    private function subGenerator(int $p1, int $p2, int $p3)
    {
        $x1 = 7 - $p2 - $p3;
        $x2 = 5 - $p1;

        $this->predictedPrices = [
            [$this->price, $this->price],
            [$this->price, $this->price],
        ];

        $prob = 1;
    // High Phase 1
    $this->predictedPrices = $this->getIndividualValue(
        $this->price,
        $this->predictedPrices,
        2,
        $p2,
        0.9,
        1.4);

    // Dec Phase 1
    probability *= this.generate_decreasing_random_price(
            given_prices, predicted_prices, 2 + high_phase_1_len, dec_phase_1_len,
            0.6, 0.8, 0.04, 0.1);
    if (probability == 0) {
        return;
    }

    // High Phase 2
    probability *= this.generate_individual_random_price(given_prices, predicted_prices,
            2 + high_phase_1_len + dec_phase_1_len, high_phase_2_len, 0.9, 1.4);
    if (probability == 0) {
        return;
    }

    // Dec Phase 2
    probability *= this.generate_decreasing_random_price(
            given_prices, predicted_prices,
            2 + high_phase_1_len + dec_phase_1_len + high_phase_2_len,
            dec_phase_2_len, 0.6, 0.8, 0.04, 0.1);
    if (probability == 0) {
        return;
    }

    // High Phase 3
    if (2 + high_phase_1_len + dec_phase_1_len + high_phase_2_len + dec_phase_2_len + high_phase_3_len != 14) {
        throw new Error("Phase lengths don't add up");
    }

    const prev_length = 2 + high_phase_1_len + dec_phase_1_len +
        high_phase_2_len + dec_phase_2_len;
    probability *= this.generate_individual_random_price(
            given_prices, predicted_prices, prev_length, 14 - prev_length, 0.9, 1.4);
    if (probability == 0) {
        return;
    }

    yield {
        pattern_description: i18next.t("patterns.fluctuating"),
      pattern_number: 0,
      prices: predicted_prices,
      probability,
    };
    }
}