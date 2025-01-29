<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\TrimmerTests;

use Boatrace\Venture\Project\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class LtrimWithFloatInputTest extends PHPUnitTestCase
{
    /**
     * @param  float  $input
     * @param  float  $expected
     * @return void
     */
    #[DataProvider('ltrimWithFloatInputProvider')]
    public function testLtrimWithFloatInput(float $input, float $expected): void
    {
        $this->assertSame($expected, Trimmer::ltrim($input));
    }

    /**
     * @return array
     */
    public static function ltrimWithFloatInputProvider(): array
    {
        return [
            [0.0, 0.0],
            [1.0, 1.0],
        ];
    }
}
