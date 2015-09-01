<?php

namespace JustPark\YeyNay\Stores;

interface StoreInterface
{
    /**
     * Create a new test.
     *
     * @param  string $name
     * @return void
     */
    public function begin($name);

    /**
     * Update a test with a conversion.
     *
     * @param  string  $name
     * @param  int     $parity
     * @return void
     */
    public function update($name, $parity);

    /**
     * Retrieve the results for a test.
     *
     * @param  string $name
     * @return <TBA>
     */
    public function results($name);
}
