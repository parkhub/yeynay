<?php

namespace JustPark\YeyNay\Stores;

use JustPark\YeyNay\Results;

class ArrayStore implements StoreInterface
{
    /**
     * Array to store tests in memory.
     *
     * @var array
     */
    protected $tests = [];

    /**
     * Create a new test.
     *
     * @param  string $name
     * @return void
     */
    public function begin($name)
    {
        if ($this->testExists($name)) {
            return;
        }

        $this->tests[$name] = [
            'odd'   => 0,
            'even'  => 0
        ];
    }

    /**
     * Check whether a test already exists.
     *
     * @param  string $name
     * @return bool
     */
    protected function testExists($name)
    {
        return array_key_exists($name, $this->tests);
    }

    /**
     * Update a test with a conversion.
     *
     * @param  string  $name
     * @param  int     $parity
     * @return void
     */
    public function update($name, $parity)
    {
        if (!$this->testExists($name)) {
            $this->begin($name);
        }

        $key = $parity === 1 ? 'odd' : 'even';

        $this->tests[$name][$key]++;
    }

    /**
     * Retrieve the results for a test.
     *
     * @param  string $name
     * @return <TBA>
     */
    public function results($name)
    {
        return new Results(
            $name,
            $this->tests[$name]['odd'],
            $this->tests[$name]['even']
        );
    }
}
