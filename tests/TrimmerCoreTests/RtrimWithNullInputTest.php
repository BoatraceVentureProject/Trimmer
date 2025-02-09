<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\TrimmerCoreTests;

use Boatrace\Venture\Project\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
class RtrimWithNullInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  mixed  $input
     * @param  mixed  $expected
     * @return void
     */
    #[DataProvider('rtrimWithNullInputProvider')]
    public function testRtrimWithNullInput(mixed $input, mixed $expected): void
    {
        $this->assertSame($expected, $this->trimmer->rtrim($input));
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
