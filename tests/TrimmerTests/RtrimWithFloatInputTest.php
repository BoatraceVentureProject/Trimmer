<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class RtrimWithFloatInputTest extends PHPUnitTestCase
{
    /**
     * @param  float  $input
     * @param  float  $expected
     * @return void
     */
    #[DataProvider('rtrimWithFloatInputProvider')]
    public function testRtrimWithFloatInput(float $input, float $expected): void
    {
        $this->assertSame($expected, Trimmer::rtrim($input));
    }

    /**
     * @return array
     */
    public static function rtrimWithFloatInputProvider(): array
    {
        return [
            [0.0, 0.0],
            [1.0, 1.0],
        ];
    }
}
