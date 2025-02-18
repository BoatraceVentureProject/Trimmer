<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerCoreTests;

use BVP\Trimmer\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
final class RtrimWithArrayInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  array  $input
     * @param  array  $expected
     * @return void
     */
    #[DataProvider('rtrimWithArrayInputProvider')]
    public function testRtrimWithArrayInput(array $input, array $expected): void
    {
        $this->assertSame($expected, $this->trimmer->rtrim($input));
    }

    /**
     * @return array
     */
    public static function rtrimWithArrayInputProvider(): array
    {
        return [
            [[' trimmerA '], [' trimmerA']],
            [[' trimmerA ', [' trimmerB ']], [' trimmerA', [' trimmerB']]],
            [["\n trimmerA \t"], ["\n trimmerA"]],
            [["\n trimmerA \t", ["\n trimmerB \t"]], ["\n trimmerA", ["\n trimmerB"]]],
            [[' trimmerA ', 1, 1.0, true, null], [' trimmerA', 1, 1.0, true, null]],
            [[' trimmerA ', [' trimmerB ', 1, 1.0, true, null]], [' trimmerA', [' trimmerB', 1, 1.0, true, null]]],
            [[1, 1.0, true, null], [1, 1.0, true, null]],
            [[1, 1.0, true, null, [1, 1.0, true, null]], [1, 1.0, true, null, [1, 1.0, true, null]]],
            [[], []],
            [[[]], [[]]],
        ];
    }
}
