<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerCoreTests;

use BVP\Trimmer\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
final class RtrimWithIntInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  int  $input
     * @param  int  $expected
     * @return void
     */
    #[DataProvider('rtrimWithIntInputProvider')]
    public function testRtrimWithIntInput(int $input, int $expected): void
    {
        $this->assertSame($expected, $this->trimmer->rtrim($input));
    }

    /**
     * @return array
     */
    public static function rtrimWithIntInputProvider(): array
    {
        return [
            [0, 0],
            [1, 1],
        ];
    }
}
