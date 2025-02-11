<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
class RtrimWithBoolInputTest extends TestCase
{
    /**
     * @param  bool  $input
     * @param  bool  $expected
     * @return void
     */
    #[DataProvider('rtrimWithBoolInputProvider')]
    public function testRtrimWithBoolInput(bool $input, bool $expected): void
    {
        $this->assertSame($expected, Trimmer::rtrim($input));
    }

    /**
     * @return array
     */
    public static function rtrimWithBoolInputProvider(): array
    {
        return [
            [true, true],
            [false, false],
        ];
    }
}
