<?php

declare(strict_types=1);

namespace Boatrace\Venture\Project\Tests;

use Boatrace\Venture\Project\Trimmer;
use Boatrace\Venture\Project\TrimmerInterface;
use Boatrace\Venture\Project\TrimmerCoreInterface;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class TrimmerInstanceTest extends PHPUnitTestCase
{
    /**
     * @return void
     */
    public function tearDown(): void
    {
        Trimmer::resetInstance();
    }

    /**
     * @return void
     */
    public function testGetInstance(): void
    {
        $this->assertInstanceOf(TrimmerInterface::class, Trimmer::getInstance());
    }

    /**
     * @return void
     */
    public function testGetInstanceWithMockInput(): void
    {
        $mock = $this->createMock(TrimmerCoreInterface::class);
        $mock->method('trim')->willReturn(' exampleA ');
        $mock->method('ltrim')->willReturn(' exampleB ');
        $mock->method('rtrim')->willReturn(' exampleC ');
        $trimmer = Trimmer::getInstance($mock);
        $this->assertInstanceOf(TrimmerInterface::class, $trimmer);
        $this->assertSame(' exampleA ', $trimmer::trim(' exampleA '));
        $this->assertSame(' exampleB ', $trimmer::ltrim(' exampleB '));
        $this->assertSame(' exampleC ', $trimmer::rtrim(' exampleC '));
    }

    /**
     * @return void
     */
    public function testCreateInstance(): void
    {
        $this->assertInstanceOf(TrimmerInterface::class, Trimmer::createInstance());
    }

    /**
     * @return void
     */
    public function testCreateInstanceWithMockInput(): void
    {
        $mock = $this->createMock(TrimmerCoreInterface::class);
        $mock->method('trim')->willReturn(' exampleA ');
        $mock->method('ltrim')->willReturn(' exampleB ');
        $mock->method('rtrim')->willReturn(' exampleC ');
        $trimmer = Trimmer::createInstance($mock);
        $this->assertInstanceOf(TrimmerInterface::class, $trimmer);
        $this->assertSame(' exampleA ', $trimmer::trim(' exampleA '));
        $this->assertSame(' exampleB ', $trimmer::ltrim(' exampleB '));
        $this->assertSame(' exampleC ', $trimmer::rtrim(' exampleC '));
    }

    /**
     * @return void
     */
    public function testResetInstance(): void
    {
        $instance1 = Trimmer::getInstance();
        Trimmer::resetInstance();
        $instance2 = Trimmer::getInstance();
        $this->assertNotSame($instance1, $instance2);
    }
}
