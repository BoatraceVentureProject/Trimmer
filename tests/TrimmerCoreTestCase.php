<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests;

use BVP\Trimmer\TrimmerCore;
use DeepCopy\DeepCopy;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
abstract class TrimmerCoreTestCase extends TestCase
{
    /**
     * @var \BVP\Trimmer\TrimmerCore
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
