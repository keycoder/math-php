<?php
namespace MathPHP\Tests\Probability\Distribution\Discrete;

use MathPHP\Probability\Distribution\Discrete\Pascal;

class PascalTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @testCase     pmf
     * @dataProvider dataProviderForPMF
     * @param        int   $r
     * @param        float $p
     * @param        int   $x
     * @param        float $expectedPmf
     * @throws       \Exception
     */
    public function testPMF(int $r, float $p, int $x, float $expectedPmf)
    {
        // Given
        $pascal = new Pascal($r, $p);

        // When
        $pmf = $pascal->pmf($x);

        // Then
        $this->assertEquals($expectedPmf, $pmf, '', 0.001);
    }

    /**
     * @return array [r, p, x, pmf]
     * Data generated with R stats dnbinom(x, r, p)
     */
    public function dataProviderForPMF(): array
    {
        return [
            [1, 0.5, 2, 0.125],
            [1, 0.4, 2, 0.144],
            [2, 0.5, 3, 0.125],
            [2, 0.3, 3, 0.12348],
            [4, 0.95, 2, 0.02036266],
            [7, 0.6, 4, 0.1504936],
            [1, 0.2, 3, 0.1024],
            [1, 0.2, 7, 0.04194304],
            [40, 0.35, 65, 0.02448896],
        ];
    }

    /**
     * @testCase     mean
     * @dataProvider dataProviderForMean
     * @param        int   $r
     * @param        float $p
     * @param        float $μ
     */
    public function testMean(int $r, float $p, float $μ)
    {
        // Given
        $pascal = new Pascal($r, $p);

        // When
        $mean = $pascal->mean();

        // Then
        $this->assertEquals($μ, $mean, '', 0.00000001);
    }

    /**
     * @return array
     */
    public function dataProviderForMean(): array
    {
        return [
            [4, 0.05, 0.21052631578947],
        ];
    }

    /**
     * @testCase     mode
     * @dataProvider dataProviderForMode
     * @param        int   $r
     * @param        float $p
     * @param        float $expected
     */
    public function testMode(int $r, float $p, float $expected)
    {
        // Given
        $pascal = new Pascal($r, $p);

        // When
        $mode = $pascal->mode();

        // Then
        $this->assertEquals($expected, $mode, '', 0.00000001);
    }

    /**
     * @return array
     */
    public function dataProviderForMode(): array
    {
        return [
            [0, 0.05, 0],
            [0, 0.95, 0],
            [1, 0.05, 0],
            [1, 0.95, 0],
            [2, 0.05, 0],
            [2, 0.5, 1],
            [2, 0.9, 9],
        ];
    }

    /**
     * @testCase     variance
     * @dataProvider dataProviderForVariance
     * @param        int   $r
     * @param        float $p
     * @param        float σ²
     */
    public function testVariance(int $r, float $p, float $σ²)
    {
        // Given
        $pascal = new Pascal($r, $p);

        // When
        $variance = $pascal->variance();

        // Then
        $this->assertEquals($σ², $variance, '', 0.00000001);
    }

    /**
     * @return array
     */
    public function dataProviderForVariance(): array
    {
        return [
            [4, 0.05, 0.22160664819945],
        ];
    }
}
}
