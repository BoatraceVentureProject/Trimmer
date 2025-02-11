<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
class LtrimWithBoolInputTest extends TestCase
{
    /**
     * @param  bool  $input
     * @param  bool  $expected
     * @return void
     */
    #[DataProvider('ltrimWithBoolInputProvider')]
    public function testLtrimWithBoolInput(bool $input, bool $expected): void
    {
        $this->assertSame($expected, Trimmer::ltrim($input));
    }

    /**
     * @return array
     */
    public static function ltrimWithBoolInputProvider(): array
    {
        return [
            [true, true],
            [false, false],
        ];
    }
}
