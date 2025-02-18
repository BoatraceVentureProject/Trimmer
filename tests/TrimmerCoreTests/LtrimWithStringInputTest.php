<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerCoreTests;

use BVP\Trimmer\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
final class LtrimWithStringInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProvider('ltrimWithStringInputProvider')]
    public function testLtrimWithStringInput(string $input, string $expected): void
    {
        $this->assertSame($expected, $this->trimmer->ltrim($input));
    }

    /**
     * @return array
     */
    public static function ltrimWithStringInputProvider(): array
    {
        return [
            [' trimmer ', 'trimmer '],
            ["\n trimmer \t", "trimmer \t"],
            ['', ''],
            [' ', ''],
        ];
    }
}
