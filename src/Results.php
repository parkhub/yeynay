<?php

namespace JustPark\YeyNay;

class Results
{
    /**
     * The name of the test.
     *
     * @var string
     */
    protected $name;

    /**
     * Conversions for the A variation of the test.
     *
     * @var int
     */
    protected $a = 0;

    /**
     * Conversions for the B variation of the test.
     *
     * @var integer
     */
    protected $b = 0;

    /**
     * Create a test results object.
     *
     * @param string $name
     * @param int    $a
     * @param int    $b
     */
    public function __construct($name, $a = 0, $b = 0)
    {
        $this->name = $name;
        $this->a = $a;
        $this->b = $b;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getA()
    {
        return $this->a;
    }

    public function getB()
    {
        return $this->b;
    }
}
