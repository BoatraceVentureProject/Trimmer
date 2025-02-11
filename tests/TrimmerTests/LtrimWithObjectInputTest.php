<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests\TrimmerTests;

use BVP\Trimmer\Trimmer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
class LtrimWithObjectInputTest extends TestCase
{
    /**
     * @param  object  $input
     * @param  array   $expected
     * @return void
     */
    #[DataProvider('ltrimWithObjectInputProvider')]
    public function testLtrimWithObjectInput(object $input, array $expected): void
    {
        $actual = Trimmer::ltrim($input);
        $this->assertSame($expected[0], $actual->getPropertyA());
        $this->assertSame($expected[1], $actual->getPropertyB());
        $this->assertSame($expected[2], $actual->getObjectB()->getPropertyC());
        $this->assertSame($expected[3], $actual->getObjectB()->getPropertyD());
    }

    /**
     * @return array
     */
    public static function ltrimWithObjectInputProvider(): array
    {
        $objectA = new class {
            private string $propertyA = ' trimmerA ';
            private string $propertyB = ' trimmerB '; // This property is not subject to trimming.
            private object $objectB;
            public function __construct() {
                $this->objectB = new class {
                    private string $propertyC = ' trimmerC ';
                    private string $propertyD = ' trimmerD '; // This property is not subject to trimming.
                    public function getPropertyC(): string { return $this->propertyC; }
                    public function setPropertyC(string $value): void { $this->propertyC = $value; }
                    public function getPropertyD(): string { return $this->propertyD; }
                };
            }
            public function getPropertyA(): string { return $this->propertyA; }
            public function setPropertyA(string $value): void { $this->propertyA = $value; }
            public function getPropertyB(): string { return $this->propertyB; }
            public function getObjectB(): object { return $this->objectB; }
        };

        return [
            [$objectA, ['trimmerA ', ' trimmerB ', 'trimmerC ', ' trimmerD ']],
        ];
    }
}
