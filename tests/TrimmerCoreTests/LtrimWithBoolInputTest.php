<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests\TrimmerCoreTests;

use Boatrace\Venture\Project\Tests\TrimmerCoreTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @author shimomo
 */
class LtrimWithBoolInputTest extends TrimmerCoreTestCase
{
    /**
     * @param  bool  $input
     * @param  bool  $expected
     * @return void
     */
    #[DataProvider('ltrimWithBoolInputProvider')]
    public function testLtrimWithBoolInput(bool $input, bool $expected): void
    {
        $this->assertSame($expected, $this->trimmer->ltrim($input));
    }

    /**
     * @return array
     */
    public static function ltrimWithBoolInputProvider(): array
    {
        return [
            [true, true],
            [false, false],
        ];
    }
}
