<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\TrimmerCoreTests;

use Boatrace\Venture\Project\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
class TrimWithStringInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProvider('trimWithStringInputProvider')]
    public function testTrimWithStringInput(string $input, string $expected): void
    {
        $this->assertSame($expected, $this->trimmer->trim($input));
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
