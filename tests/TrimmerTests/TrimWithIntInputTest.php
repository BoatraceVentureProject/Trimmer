<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\TrimmerTests;

use Boatrace\Venture\Project\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class TrimWithIntInputTest extends PHPUnitTestCase
{
    /**
     * @param  int  $input
     * @param  int  $expected
     * @return void
     */
    #[DataProvider('trimWithIntInputProvider')]
    public function testTrimWithIntInput(int $input, int $expected): void
    {
        $this->assertSame($expected, Trimmer::trim($input));
    }

    /**
     * @return array
     */
    public static function trimWithIntInputProvider(): array
    {
        return [
            [0, 0],
            [1, 1],
        ];
    }
}
