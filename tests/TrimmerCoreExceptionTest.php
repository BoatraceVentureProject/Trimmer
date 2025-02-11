<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests;

use BadMethodCallException;
use BVP\Trimmer\TrimmerCore;

/**
 * @author shimomo
 */
class TrimmerCoreExceptionTest extends TrimmerCoreTestCase
{
    /**
     * @return void
     */
    public function testException(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage(
            'Method \'invalid\' does not exist on \'BVP\Trimmer\TrimmerCore\'.'
        );

        $this->trimmer->invalid();
    }
}
