<?php

use JustPark\YeyNay\Results;

class ResultsTest extends PHPUnit_Framework_TestCase
{
    public function testResultsObjectCanBeCreated()
    {
        $results = new Results('foo');
    }

    public function testResultsObjectCanBeCreatedWithValues()
    {
        $results = new Results('foo', 2, 3);
    }

    public function testResultsObjectValuesCanBeRetrieved()
    {
        $results = new Results('foo', 2, 3);
        $this->assertEquals('foo', $results->getName());
        $this->assertEquals(2, $results->getA());
        $this->assertEquals(3, $results->getB());
    }
}
