<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerCoreTests;

use BVP\Trimmer\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
class TrimWithArrayInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  array  $input
     * @param  array  $expected
     * @return void
     */
    #[DataProvider('trimWithArrayInputProvider')]
    public function testTrimWithArrayInput(array $input, array $expected): void
    {
        $this->assertSame($expected, $this->trimmer->trim($input));
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
