<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\TrimmerTests;

use Boatrace\Venture\Project\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class LtrimWithStringInputTest extends PHPUnitTestCase
{
    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProvider('ltrimWithStringInputProvider')]
    public function testLtrimWithStringInput(string $input, string $expected): void
    {
        $this->assertSame($expected, Trimmer::ltrim($input));
    }

    /**
     * @return array
     */
    public static function ltrimWithStringInputProvider(): array
    {
        return [
            [' trimmer ', 'trimmer '],
            ["\n trimmer \t", "trimmer \t"],
            ['', ''],
            [' ', ''],
        ];
    }
}
