<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project;

use BadMethodCallException;
use DeepCopy\DeepCopy;

/**
 * @author shimomo
 */
class TrimmerCore implements TrimmerCoreInterface
{
    /**
     * @param  \DeepCopy\DeepCopy  $copier
     * @return void
     */
    public function __construct(private readonly DeepCopy $copier) {}

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return void
     *
     * @throws \BadMethodCallException
     */
    public function __call(string $name, array $arguments): void
    {
        throw new BadMethodCallException(
            'Method \'' . $name . '\' does not exist on \'' . self::class . '\'.'
        );
    }

    /**
     * @param  mixed   $items
     * @param  string  $characters
     * @return mixed
     */
    public function trim(mixed $items, string $characters = "\x00\x09\x0A\x0B\x0D\x20"): mixed
    {
        $function = fn($value, $characters) => trim($value, $characters);
        $copyItems = $this->copier->copy($items);
        return $this->applyTrim($function, $copyItems, $characters);
    }

    /**
     * @param  mixed   $items
     * @param  string  $characters
     * @return mixed
     */
    public function ltrim(mixed $items, string $characters = "\x00\x09\x0A\x0B\x0D\x20"): mixed
    {
        $function = fn($value, $characters) => ltrim($value, $characters);
        $copyItems = $this->copier->copy($items);
        return $this->applyTrim($function, $copyItems, $characters);
    }

    /**
     * @param  mixed   $items
     * @param  string  $characters
     * @return mixed
     */
    public function rtrim(mixed $items, string $characters = "\x00\x09\x0A\x0B\x0D\x20"): mixed
    {
        $function = fn($value, $characters) => rtrim($value, $characters);
        $copyItems = $this->copier->copy($items);
        return $this->applyTrim($function, $copyItems, $characters);
    }

    /**
     * @param  callable  $function
     * @param  mixed     $items
     * @param  string    $characters
     * @return mixed
     */
    private function applyTrim(callable $function, mixed $items, string $characters): mixed
    {
        if (is_string($items)) {
            return $function($items, $characters);
        } elseif (is_array($items)) {
            return $this->applyTrimArray($function, $characters, $items);
        } elseif (is_object($items)) {
            return $this->applyTrimObject($function, $characters, $items);
        }

        return $items;
    }

    /**
     * @param  callable  $function
     * @param  string    $characters
     * @param  array     $items
     * @return array
     */
    private function applyTrimArray(callable $function, string $characters, array $items): array
    {
        return array_map(fn($item) => $this->applyTrim($function, $item, $characters), $items);
    }

    /**
     * @param  callable  $function
     * @param  string    $characters
     * @param  object    $items
     * @return object
     */
    private function applyTrimObject(callable $function, string $characters, object $items): object
    {
        $propertyNames = [];
        foreach (get_class_methods($items) as $methodName) {
            if (preg_match('/^get([A-Z].*)$/u', $methodName, $matches)) {
                $propertyNames[] = $matches[1];
            }
        }

        foreach ($propertyNames as $propertyName) {
            $getter = 'get' . $propertyName;
            $setter = 'set' . $propertyName;
            if (method_exists($items, $getter)) {
                $value = $items->$getter();
                $trimmedValue = $this->applyTrim($function, $value, $characters);
                if (method_exists($items, $setter)) {
                    $items->$setter($trimmedValue);
                }
            }
        }

        return $items;
    }
}
