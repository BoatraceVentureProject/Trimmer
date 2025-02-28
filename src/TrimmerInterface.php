<?php

declare(strict_types=1);

namespace BVP\Trimmer;

/**
 * @author shimomo
 */
interface TrimmerInterface
{
    /**
     * @param  \BVP\Trimmer\TrimmerCoreInterface|null  $trimmerCore
     * @return \BVP\Trimmer\TrimmerInterface
     */
    public static function getInstance(?TrimmerCoreInterface $trimmerCore = null): TrimmerInterface;

    /**
     * @param  \BVP\Trimmer\TrimmerCoreInterface|null  $trimmerCore
     * @return \BVP\Trimmer\TrimmerInterface
     */
    public static function createInstance(?TrimmerCoreInterface $trimmerCore = null): TrimmerInterface;

    /**
     * @return void
     */
    public static function resetInstance(): void;
}
