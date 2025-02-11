<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class RtrimWithStringInputTest extends PHPUnitTestCase
{
    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProvider('rtrimWithStringInputProvider')]
    public function testRtrimWithStringInput(string $input, string $expected): void
    {
        $this->assertSame($expected, Trimmer::rtrim($input));
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
