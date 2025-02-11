<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
class TrimWithStringInputTest extends TestCase
{
    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProvider('trimWithStringInputProvider')]
    public function testTrimWithStringInput(string $input, string $expected): void
    {
        $this->assertSame($expected, Trimmer::trim($input));
    }

    /**
     * @return array
     */
    public static function trimWithStringInputProvider(): array
    {
        return [
            [' trimmer ', 'trimmer'],
            ["\n trimmer \t", 'trimmer'],
            ['', ''],
            [' ', ''],
        ];
    }
}
