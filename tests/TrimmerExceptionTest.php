<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests;

use BadMethodCallException;
use Boatrace\Venture\Project\Trimmer;
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
            'Method \'invalid\' does not exist on \'Boatrace\Venture\Project\TrimmerCore\'.'
        );

        Trimmer::invalid();
    }
}
