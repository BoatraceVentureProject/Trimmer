<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class LtrimWithIntInputTest extends PHPUnitTestCase
{
    /**
     * @param  int  $input
     * @param  int  $expected
     * @return void
     */
    #[DataProvider('ltrimWithIntInputProvider')]
    public function testTrimWithIntInput(int $input, int $expected): void
    {
        $this->assertSame($expected, Trimmer::ltrim($input));
    }

    /**
     * @return array
     */
    public static function ltrimWithIntInputProvider(): array
    {
        return [
            [0, 0],
            [1, 1],
        ];
    }
}
