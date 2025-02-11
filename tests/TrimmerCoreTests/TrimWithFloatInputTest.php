<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerCoreTests;

use BVP\Trimmer\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
class TrimWithFloatInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  float  $input
     * @param  float  $expected
     * @return void
     */
    #[DataProvider('trimWithFloatInputProvider')]
    public function testTrimWithFloatInput(float $input, float $expected): void
    {
        $this->assertSame($expected, $this->trimmer->trim($input));
    }

    /**
     * @return array
     */
    public static function trimWithFloatInputProvider(): array
    {
        return [
            [0.0, 0.0],
            [1.0, 1.0],
        ];
    }
}
