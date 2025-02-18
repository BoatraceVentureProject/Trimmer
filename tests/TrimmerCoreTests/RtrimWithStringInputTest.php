<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerCoreTests;

use BVP\Trimmer\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
final class RtrimWithStringInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProvider('rtrimWithStringInputProvider')]
    public function testRtrimWithStringInput(string $input, string $expected): void
    {
        $this->assertSame($expected, $this->trimmer->rtrim($input));
    }

    /**
     * @return array
     */
    public static function rtrimWithStringInputProvider(): array
    {
        return [
            [' trimmer ', ' trimmer'],
            ["\n trimmer \t", "\n trimmer"],
            ['', ''],
            [' ', ''],
        ];
    }
}
