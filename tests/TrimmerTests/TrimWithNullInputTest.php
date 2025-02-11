<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
class TrimWithNullInputTest extends TestCase
{
    /**
     * @param  mixed  $input
     * @param  mixed  $expected
     * @return void
     */
    #[DataProvider('trimWithNullInputProvider')]
    public function testTrimWithNullInput(mixed $input, mixed $expected): void
    {
        $this->assertSame($expected, Trimmer::trim($input));
    }

    /**
     * @return array
     */
    public static function trimWithNullInputProvider(): array
    {
        return [
            [null, null],
        ];
    }
}
