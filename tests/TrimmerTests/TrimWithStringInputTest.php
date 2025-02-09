<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\TrimmerTests;

use Boatrace\Venture\Project\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class TrimWithStringInputTest extends PHPUnitTestCase
{
    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProvider('trimWithStringInputProvider')]
    public function testTrimWithStringInput(string $input, string $expected): void
    {
        $this->assertSame($expected, Trimmer::trim($input));
    }

    /**
     * @return array
     */
    public static function trimWithStringInputProvider(): array
    {
        return [
            [' trimmer ', 'trimmer'],
            ["\n trimmer \t", 'trimmer'],
            ['', ''],
            [' ', ''],
        ];
    }
}
