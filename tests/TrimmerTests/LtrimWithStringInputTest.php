<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
class LtrimWithStringInputTest extends TestCase
{
    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProvider('ltrimWithStringInputProvider')]
    public function testLtrimWithStringInput(string $input, string $expected): void
    {
        $this->assertSame($expected, Trimmer::ltrim($input));
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
