<?php

use PHPUnit\Framework\TestCase;

/**
 * Combination of `@depends` and `@dataProvider` in same test
 * https://phpunit.de/manual/current/zh_cn/writing-tests-for-phpunit.html#writing-tests-for-phpunit.data-providers.examples.DependencyAndDataProviderCombo.php
 */
class DependencyAndDataProviderComboTest extends TestCase
{
    public function provider()
    {
        return [['provider1'], ['provider2']];
    }

    public function testProducerFirst()
    {
        $this->assertTrue(true);

        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);

        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     * @dataProvider provider
     */
    public function testConsumer()
    {
        $this->assertEquals([
            'provider1',
            'first',
            'second',
        ], func_get_args());
    }
}
