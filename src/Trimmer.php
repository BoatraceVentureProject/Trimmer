<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

use DeepCopy\DeepCopy;

/**
 * @author shimomo
 */
class Trimmer implements TrimmerInterface
{
    /**
     * @var \Boatrace\Venture\Project\TrimmerInterface|null
     */
    private static ?TrimmerInterface $instance;

    /**
     * @param  \Boatrace\Venture\Project\TrimmerCoreInterface  $trimmer
     * @return void
     */
    public function __construct(private readonly TrimmerCoreInterface $trimmer) {}

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments): mixed
    {
        return $this->trimmer->$name(...$arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments): mixed
    {
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @param  \Boatrace\Venture\Project\TrimmerCoreInterface|null  $trimmerCore
     * @return \Boatrace\Venture\Project\TrimmerInterface
     */
    public static function getInstance(?TrimmerCoreInterface $trimmerCore = null): TrimmerInterface
    {
        return self::$instance ??= new self($trimmerCore ?? new TrimmerCore(new DeepCopy()));
    }

    /**
     * @param  \Boatrace\Venture\Project\TrimmerCoreInterface|null  $trimmerCore
     * @return \Boatrace\Venture\Project\TrimmerInterface
     */
    public static function createInstance(?TrimmerCoreInterface $trimmerCore = null): TrimmerInterface
    {
        return self::$instance = new self($trimmerCore ?? new TrimmerCore(new DeepCopy()));
    }

    /**
     * @return void
     */
    public static function resetInstance(): void
    {
        self::$instance = null;
    }
}
