<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests;

use BadMethodCallException;
use Boatrace\Venture\Project\TrimmerCore;

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
            'Method \'invalid\' does not exist on \'Boatrace\Venture\Project\TrimmerCore\'.'
        );

        $this->trimmer->invalid();
    }
}
