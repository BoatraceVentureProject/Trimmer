<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\TrimmerTests;

use Boatrace\Venture\Project\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class LtrimWithArrayInputTest extends PHPUnitTestCase
{
    /**
     * @param  array  $input
     * @param  array  $expected
     * @return void
     */
    #[DataProvider('ltrimWithArrayInputProvider')]
    public function testLtrimWithArrayInput(array $input, array $expected): void
    {
        $this->assertSame($expected, Trimmer::ltrim($input));
    }

    /**
     * @return array
     */
    public static function ltrimWithArrayInputProvider(): array
    {
        return [
            [[' trimmerA '], ['trimmerA ']],
            [[' trimmerA ', [' trimmerB ']], ['trimmerA ', ['trimmerB ']]],
            [["\n trimmerA \t"], ["trimmerA \t"]],
            [["\n trimmerA \t", ["\n trimmerB \t"]], ["trimmerA \t", ["trimmerB \t"]]],
            [[' trimmerA ', 1, 1.0, true, null], ['trimmerA ', 1, 1.0, true, null]],
            [[' trimmerA ', [' trimmerB ', 1, 1.0, true, null]], ['trimmerA ', ['trimmerB ', 1, 1.0, true, null]]],
            [[1, 1.0, true, null], [1, 1.0, true, null]],
            [[1, 1.0, true, null, [1, 1.0, true, null]], [1, 1.0, true, null, [1, 1.0, true, null]]],
            [[], []],
            [[[]], [[]]],
        ];
    }
}
