<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
class RtrimWithNullInputTest extends TestCase
{
    /**
     * @param  mixed  $input
     * @param  mixed  $expected
     * @return void
     */
    #[DataProvider('rtrimWithNullInputProvider')]
    public function testRtrimWithNullInput(mixed $input, mixed $expected): void
    {
        $this->assertSame($expected, Trimmer::rtrim($input));
    }

    /**
     * @return array
     */
    public static function rtrimWithNullInputProvider(): array
    {
        return [
            [null, null],
        ];
    }
}
