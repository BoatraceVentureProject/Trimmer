<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

/**
 * @author shimomo
 */
interface TrimmerCoreInterface
{
    /**
     * @param  mixed   $items
     * @param  string  $characters
     * @return mixed
     */
    public function trim(mixed $items, string $characters = "\x00\x09\x0A\x0B\x0D\x20"): mixed;

    /**
     * @param  mixed   $items
     * @param  string  $characters
     * @return mixed
     */
    public function ltrim(mixed $items, string $characters = "\x00\x09\x0A\x0B\x0D\x20"): mixed;

    /**
     * @param  mixed   $items
     * @param  string  $characters
     * @return mixed
     */
    public function rtrim(mixed $items, string $characters = "\x00\x09\x0A\x0B\x0D\x20"): mixed;
}
