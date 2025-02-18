<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests;

use BadMethodCallException;
use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class TrimmerExceptionTest extends TestCase
{
    /**
     * @return void
     */
    public function testException(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\Trimmer\TrimmerCore::__call() - " .
            "The specified method 'invalid' does not exist in class 'BVP\Trimmer\TrimmerCore'."
        );

        Trimmer::invalid();
    }
}
