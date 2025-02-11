<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class TrimWithBoolInputTest extends PHPUnitTestCase
{
    /**
     * @param  bool  $input
     * @param  bool  $expected
     * @return void
     */
    #[DataProvider('trimWithBoolInputProvider')]
    public function testTrimWithBoolInput(bool $input, bool $expected): void
    {
        $this->assertSame($expected, Trimmer::trim($input));
    }

    /**
     * @return array
     */
    public static function trimWithBoolInputProvider(): array
    {
        return [
            [true, true],
            [false, false],
        ];
    }
}
