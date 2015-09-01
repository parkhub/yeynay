<?php

use JustPark\YeyNay\Runner;
use JustPark\YeyNay\Results;
use JustPark\YeyNay\Stores\ArrayStore;

class ArrayStoreTest extends PHPUnit_Framework_TestCase
{
    public function testArrayStoreCanBeCreated()
    {
        $store = new ArrayStore;
    }

    public function testArrayStoreCanBeRegistered()
    {
        $store = new ArrayStore;
        $runner = new Runner($store);
    }

    public function testArrayStoreCanReceiveNewTest()
    {
        $store = new ArrayStore;
        $store->begin('foo');
    }

    public function testArrayStoreCanReceiveTestUpdate()
    {
        $store = new ArrayStore;
        $store->update('foo', Runner::A);
    }

    public function testArrayStoreResultsCanBeRetrieved()
    {
        $store = new ArrayStore;
        $store->update('foo', Runner::A);
        $this->assertInstanceOf(Results::class, $store->results('foo'));
    }

    public function testArrayStoreTestResultsArePersistedCorrectly()
    {
        $store = new ArrayStore;
        $store->begin('foo');
        $store->update('foo', Runner::A);
        $store->update('foo', Runner::A);
        $store->update('foo', Runner::A);
        $store->update('foo', Runner::B);
        $store->update('foo', Runner::B);
        $store->update('foo', Runner::B);
        $store->update('foo', Runner::B);
        $store->update('foo', Runner::B);
        $results = $store->results('foo');
        $this->assertEquals(3, $results->getA());
        $this->assertEquals(5, $results->getB());
    }
}
