<?php

declare(strict_types=1);

namespace BVP\Trimmer\Tests;

use BVP\Trimmer\TrimmerCore;
use DeepCopy\DeepCopy;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class TrimmerCoreTest extends TestCase
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

    /**
     * @param  mixed  $input
     * @param  mixed  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'trimArrayProvider')]
    public function testTrimArray(array $input, array $expected): void
    {
        $this->assertSame($expected, $this->trimmer->trim($input));
    }

    /**
     * @param  bool  $input
     * @param  bool  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'trimBoolProvider')]
    public function testTrimBool(bool $input, bool $expected): void
    {
        $this->assertSame($expected, $this->trimmer->trim($input));
    }

    /**
     * @param  float  $input
     * @param  float  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'trimFloatProvider')]
    public function testTrimFloat(float $input, float $expected): void
    {
        $this->assertSame($expected, $this->trimmer->trim($input));
    }

    /**
     * @param  int  $input
     * @param  int  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'trimIntProvider')]
    public function testTrimInt(int $input, int $expected): void
    {
        $this->assertSame($expected, $this->trimmer->trim($input));
    }

    /**
     * @param  null  $input
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'trimNullProvider')]
    public function testTrimNull(null $input): void
    {
        $this->assertNull($this->trimmer->trim($input));
    }

    /**
     * @param  object  $input
     * @param  array   $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'trimObjectProvider')]
    public function testTrimObject(object $input, array $expected): void
    {
        $actual = $this->trimmer->trim($input);
        $this->assertSame($expected, [
            $actual->getPropertyA(),
            $actual->getPropertyB(),
            $actual->getObjectB()->getPropertyC(),
            $actual->getObjectB()->getPropertyD(),
        ]);
    }

    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'trimStringProvider')]
    public function testTrimString(string $input, string $expected): void
    {
        $this->assertSame($expected, $this->trimmer->trim($input));
    }

    /**
     * @param  mixed  $input
     * @param  mixed  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'ltrimArrayProvider')]
    public function testLtrimArray(array $input, array $expected): void
    {
        $this->assertSame($expected, $this->trimmer->ltrim($input));
    }

    /**
     * @param  bool  $input
     * @param  bool  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'ltrimBoolProvider')]
    public function testLtrimBool(bool $input, bool $expected): void
    {
        $this->assertSame($expected, $this->trimmer->ltrim($input));
    }

    /**
     * @param  float  $input
     * @param  float  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'ltrimFloatProvider')]
    public function testLtrimFloat(float $input, float $expected): void
    {
        $this->assertSame($expected, $this->trimmer->ltrim($input));
    }

    /**
     * @param  int  $input
     * @param  int  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'ltrimIntProvider')]
    public function testLtrimInt(int $input, int $expected): void
    {
        $this->assertSame($expected, $this->trimmer->ltrim($input));
    }

    /**
     * @param  null  $input
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'ltrimNullProvider')]
    public function testLtrimNull(null $input): void
    {
        $this->assertNull($this->trimmer->ltrim($input));
    }

    /**
     * @param  object  $input
     * @param  array   $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'ltrimObjectProvider')]
    public function testLtrimObject(object $input, array $expected): void
    {
        $actual = $this->trimmer->ltrim($input);
        $this->assertSame($expected, [
            $actual->getPropertyA(),
            $actual->getPropertyB(),
            $actual->getObjectB()->getPropertyC(),
            $actual->getObjectB()->getPropertyD(),
        ]);
    }

    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'ltrimStringProvider')]
    public function testLtrimString(string $input, string $expected): void
    {
        $this->assertSame($expected, $this->trimmer->ltrim($input));
    }

    /**
     * @param  mixed  $input
     * @param  mixed  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'rtrimArrayProvider')]
    public function testRtrimArray(array $input, array $expected): void
    {
        $this->assertSame($expected, $this->trimmer->rtrim($input));
    }

    /**
     * @param  bool  $input
     * @param  bool  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'rtrimBoolProvider')]
    public function testRtrimBool(bool $input, bool $expected): void
    {
        $this->assertSame($expected, $this->trimmer->rtrim($input));
    }

    /**
     * @param  float  $input
     * @param  float  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'rtrimFloatProvider')]
    public function testRtrimFloat(float $input, float $expected): void
    {
        $this->assertSame($expected, $this->trimmer->rtrim($input));
    }

    /**
     * @param  int  $input
     * @param  int  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'rtrimIntProvider')]
    public function testRtrimInt(int $input, int $expected): void
    {
        $this->assertSame($expected, $this->trimmer->rtrim($input));
    }

    /**
     * @param  null  $input
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'rtrimNullProvider')]
    public function testRtrimNull(null $input): void
    {
        $this->assertNull($this->trimmer->rtrim($input));
    }

    /**
     * @param  object  $input
     * @param  array   $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'rtrimObjectProvider')]
    public function testRtrimObject(object $input, array $expected): void
    {
        $actual = $this->trimmer->rtrim($input);
        $this->assertSame($expected, [
            $actual->getPropertyA(),
            $actual->getPropertyB(),
            $actual->getObjectB()->getPropertyC(),
            $actual->getObjectB()->getPropertyD(),
        ]);
    }

    /**
     * @param  string  $input
     * @param  string  $expected
     * @return void
     */
    #[DataProviderExternal(TrimmerCoreDataProvider::class, 'rtrimStringProvider')]
    public function testRtrimString(string $input, string $expected): void
    {
        $this->assertSame($expected, $this->trimmer->rtrim($input));
    }

    /**
     * @return void
     */
    public function testThrowsExceptionWhenMethodDoesNotExist(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "BVP\Trimmer\TrimmerCore::__call() - " .
            "The specified method 'ghost' does not exist in class 'BVP\Trimmer\TrimmerCore'."
        );

        $this->trimmer->ghost(1, '2024-01-08');
    }
}
