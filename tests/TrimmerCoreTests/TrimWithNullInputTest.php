<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerCoreTests;

use BVP\Trimmer\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
final class TrimWithNullInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  mixed  $input
     * @param  mixed  $expected
     * @return void
     */
    #[DataProvider('trimWithNullInputProvider')]
    public function testTrimWithNullInput(mixed $input, mixed $expected): void
    {
        $this->assertSame($expected, $this->trimmer->trim($input));
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
