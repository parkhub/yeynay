![YeyNay](extra/logo.png)

![Travis](https://img.shields.io/travis/justpark/yeynay.svg)

YeyNay is an evolution of a multi-variate testing framework for use at [JustPark](https://www.justpark.com).

At its current stage of evolution, YeyNay is a coin-toss (dumb) A/B testing framework. It uses a provided dynamic value (odd/even) to decide whether to run A or B variations. It can use a number of interchangable datastores to record a count of conversions.

Confused? Maybe an example would be better.

**First, instantiate the runner with a data store:**

```php
$store = new \JustPark\YeyNay\Stores\ArrayStore; // In memory, short term store.
$yeyNay = new \JustPark\YeyNay\Runner($store);
```

**Now you can run variations based on a dynamic integer value:**

It's best to pick something like an auto-incremental ID. Let's use a user ID.

```php
if ($yeyNay->variation('key\_for\_test', $user->id)) {
    // Code for variation A.
} else {
    // Code for variation B.
}
```

**Next, track conversions on successful actions.**

```php
$yeyNay->convert('key\_for\_test', $user->id);
```

**Finally, view the test results.**

```php
$results = $yeyNay->results('key\_for\_test');
$results->getA(); // Count of conversions for variation A. (odd)
$results->getB(); // Count of conversions for variation B. (even)
```

Better docs coming soon. In fact, better features coming soon! Feel free to take a look, but please don't use in production right now.

Enjoy!

Devs@JP.
