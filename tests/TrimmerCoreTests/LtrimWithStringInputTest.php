<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\TrimmerCoreTests;

use Boatrace\Venture\Project\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
class LtrimWithStringInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProvider('ltrimWithStringInputProvider')]
    public function testLtrimWithStringInput(string $input, string $expected): void
    {
        $this->assertSame($expected, $this->trimmer->ltrim($input));
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
