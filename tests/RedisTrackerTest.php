<?php
namespace RedisTracker;

use Luracast\Config\Config as TrackerConfig;
use PHPUnit\Framework\TestCase;
use robrogers\Tracker\RedisTracker;


class RedisTrackerTest extends TestCase
{
    public function setUp()
    {
        TrackerConfig::init(__DIR__ . '/config');
        parent::setUp();
    }
    /**
     * @test
     */
    public function it_tests_rancher_tracker_is_instantiable()
    {
        $tracker = RedisTracker::singleton('money', 10);
        $this->assertTrue(is_a($tracker, 'robrogers\Tracker\RedisTracker'));
    }

    /**
     * @test
     */
    public function it_tests_redis_tracker_can_track()
    {
        $tracker = RedisTracker::singleton('xyz',3);

        $tracker->push('xxx');

        $this->assertEquals('xxx', $tracker->get('xxx'));

        $this->assertTrue($tracker->has('xxx'));
    }
}
