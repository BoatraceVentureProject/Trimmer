<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
class LtrimWithNullInputTest extends TestCase
{
    /**
     * @param  mixed  $input
     * @param  mixed  $expected
     * @return void
     */
    #[DataProvider('ltrimWithNullInputProvider')]
    public function testLtrimWithNullInput(mixed $input, mixed $expected): void
    {
        $this->assertSame($expected, Trimmer::ltrim($input));
    }

    /**
     * @return array
     */
    public static function ltrimWithNullInputProvider(): array
    {
        return [
            [null, null],
        ];
    }
}
