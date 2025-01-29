<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\TrimmerCoreTests;

use Boatrace\Venture\Project\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
class RtrimWithStringInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProvider('rtrimWithStringInputProvider')]
    public function testRtrimWithStringInput(string $input, string $expected): void
    {
        $this->assertSame($expected, $this->trimmer->rtrim($input));
    }

    /**
     * @return array
     */
    public static function rtrimWithStringInputProvider(): array
    {
        return [
            [' trimmer ', ' trimmer'],
            ["\n trimmer \t", "\n trimmer"],
            ['', ''],
            [' ', ''],
        ];
    }
}
