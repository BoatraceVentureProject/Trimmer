<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerCoreTests;

use BVP\Trimmer\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
class TrimWithIntInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  int  $input
     * @param  int  $expected
     * @return void
     */
    #[DataProvider('trimWithIntInputProvider')]
    public function testTrimWithIntInput(int $input, int $expected): void
    {
        $this->assertSame($expected, $this->trimmer->trim($input));
    }

    /**
     * @return array
     */
    public static function trimWithIntInputProvider(): array
    {
        return [
            [0, 0],
            [1, 1],
        ];
    }
}
