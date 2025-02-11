<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class TrimWithArrayInputTest extends PHPUnitTestCase
{
    /**
     * @param  array  $input
     * @param  array  $expected
     * @return void
     */
    #[DataProvider('trimWithArrayInputProvider')]
    public function testTrimWithArrayInput(array $input, array $expected): void
    {
        $this->assertSame($expected, Trimmer::trim($input));
    }

    /**
     * @return array
     */
    public static function trimWithArrayInputProvider(): array
    {
        return [
            [[' trimmerA '], ['trimmerA']],
            [[' trimmerA ', [' trimmerB ']], ['trimmerA', ['trimmerB']]],
            [["\n trimmerA \t"], ['trimmerA']],
            [["\n trimmerA \t", ["\n trimmerB \t"]], ['trimmerA', ['trimmerB']]],
            [[' trimmerA ', 1, 1.0, true, null], ['trimmerA', 1, 1.0, true, null]],
            [[' trimmerA ', [' trimmerB ', 1, 1.0, true, null]], ['trimmerA', ['trimmerB', 1, 1.0, true, null]]],
            [[1, 1.0, true, null], [1, 1.0, true, null]],
            [[1, 1.0, true, null, [1, 1.0, true, null]], [1, 1.0, true, null, [1, 1.0, true, null]]],
            [[], []],
            [[[]], [[]]],
        ];
    }
}
