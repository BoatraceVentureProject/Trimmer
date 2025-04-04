<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerCoreTests;

use BVP\Trimmer\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
final class LtrimWithNullInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  mixed  $input
     * @param  mixed  $expected
     * @return void
     */
    #[DataProvider('ltrimWithNullInputProvider')]
    public function testLtrimWithNullInput(mixed $input, mixed $expected): void
    {
        $this->assertSame($expected, $this->trimmer->ltrim($input));
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
