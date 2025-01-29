<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests;

use Boatrace\Venture\Project\TrimmerCore;
use DeepCopy\DeepCopy;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
abstract class TrimmerCoreTestCase extends TestCase
{
    /**
     * @var \Boatrace\Venture\Project\TrimmerCore
     */
    protected TrimmerCore $trimmer;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->trimmer = new TrimmerCore(new DeepCopy());
    }
}
