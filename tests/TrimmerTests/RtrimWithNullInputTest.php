<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\TrimmerTests;

use Boatrace\Venture\Project\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class RtrimWithNullInputTest extends PHPUnitTestCase
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
