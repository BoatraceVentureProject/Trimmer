<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerCoreTests;

use BVP\Trimmer\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
class LtrimWithBoolInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  bool  $input
     * @param  bool  $expected
     * @return void
     */
    #[DataProvider('ltrimWithBoolInputProvider')]
    public function testLtrimWithBoolInput(bool $input, bool $expected): void
    {
        $this->assertSame($expected, $this->trimmer->ltrim($input));
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
