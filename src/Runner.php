<?php

namespace JustPark\YeyNay;

use JustPark\YeyNay\Stores\StoreInterface;

class Runner
{
    /**
     * Set constant for A variation.
     */
    const A = 1;

    /**
     * Set constant for B variation.
     */
    const B = 2;

    /**
     * The datastore implementation to use.
     *
     * @var StoreInterface
     */
    protected $store;

    /**
     * Create a new runner instance with a data store.
     *
     * @param StoreInterface $store
     */
    public function __construct(StoreInterface $store)
    {
        $this->store = $store;
    }

    /**
     * Determine the variation of a test to execute.
     *
     * @param  string  $name
     * @param  integer $parityValue
     * @return bool
     */
    public function variation($name, $parityValue = 1)
    {
        $this->store->begin($name);
        return (bool) ($parityValue % 2);
    }

    /**
     * Register a conversion for a specific test variation.
     *
     * @param  string $name
     * @param  int    $parityValue
     * @return void
     */
    public function convert($name, $parityValue)
    {
        $value = $parityValue % 2 ? self::A : self::B;
        $this->store->update($name, $value);
    }

    /**
     * Get a results object for a specific test.
     *
     * @param  string $name
     * @return \JustPark\YinYang\Results
     */
    public function results($name)
    {
        return $this->store->results($name);
    }
}
