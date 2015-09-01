<?php

use JustPark\YeyNay\Runner;
use JustPark\YeyNay\Results;
use JustPark\YeyNay\Stores\ArrayStore;

class RunnerTest extends PHPUnit_Framework_TestCase
{
    public function testCanCreateTestRunner()
    {
        $store = new ArrayStore;
        $runner = new Runner($store);
    }

    public function testCanRunATestWithVariations()
    {
        $store = new ArrayStore;
        $runner = new Runner($store);

        if ($runner->variation('foo', 1)) {
            $foo = 'womble';
        } else {
            $foo = 'panda';
        }
        $this->assertEquals('womble', $foo);

        if ($runner->variation('foo', 2)) {
            $foo = 'womble';
        } else {
            $foo = 'panda';
        }
        $this->assertEquals('panda', $foo);
    }

    public function testThatConversionsCanBeMade()
    {
        $store = new ArrayStore;
        $runner = new Runner($store);
        $runner->variation('foo');
        $runner->convert('foo', Runner::A);
        $runner->convert('foo', Runner::B);
    }

    public function testResultsObjectCanBeRetrieved()
    {
        $store = new ArrayStore;
        $runner = new Runner($store);
        $runner->variation('foo');
        $results = $runner->results('foo');
        $this->assertInstanceOf(Results::class, $results);
    }

    public function testThatConversionsAreTrackedCorrectly()
    {
        $store = new ArrayStore;
        $runner = new Runner($store);
        $runner->variation('foo');
        $runner->convert('foo', Runner::A);
        $runner->convert('foo', Runner::B);
        $runner->convert('foo', Runner::A);
        $runner->convert('foo', Runner::B);
        $runner->convert('foo', Runner::A);
        $this->assertEquals(3, $runner->results('foo')->getA());
        $this->assertEquals(2, $runner->results('foo')->getB());
    }
}
