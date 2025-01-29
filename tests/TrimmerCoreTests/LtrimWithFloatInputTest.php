<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\TrimmerCoreTests;

use Boatrace\Venture\Project\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
class LtrimWithFloatInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  float  $input
     * @param  float  $expected
     * @return void
     */
    #[DataProvider('ltrimWithFloatInputProvider')]
    public function testLtrimWithFloatInput(float $input, float $expected): void
    {
        $this->assertSame($expected, $this->trimmer->ltrim($input));
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
