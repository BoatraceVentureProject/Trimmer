<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests;

use BadMethodCallException;
use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class TrimmerExceptionTest extends PHPUnitTestCase
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

        Trimmer::invalid();
    }
}
