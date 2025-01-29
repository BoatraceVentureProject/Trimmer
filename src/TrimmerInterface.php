<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

/**
 * @author shimomo
 */
interface TrimmerInterface
{
    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments): mixed;

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments): mixed;

    /**
     * @param  \Boatrace\Venture\Project\TrimmerCoreInterface|null  $trimmerCore
     * @return \Boatrace\Venture\Project\TrimmerInterface
     */
    public static function getInstance(?TrimmerCoreInterface $trimmerCore = null): TrimmerInterface;

    /**
     * @param  \Boatrace\Venture\Project\TrimmerCoreInterface|null  $trimmerCore
     * @return \Boatrace\Venture\Project\TrimmerInterface
     */
    public static function createInstance(?TrimmerCoreInterface $trimmerCore = null): TrimmerInterface;

    /**
     * @return void
     */
    public static function resetInstance(): void;
}
