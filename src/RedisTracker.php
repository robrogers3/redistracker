<?php

namespace robrogers\Tracker;

use Luracast\Config\Config;
use Predis\Client;
use Redis;

class RedisTracker
{
    private static $tracker;

    /** @var  \Redis */
    private $handle;
    protected $key;
    protected $expiry;
    private $expirySet = false;

    private function __construct()
    {
    }

    public static function singleton($key, $expiry = 0)
    {
        if (!self::$tracker) {
            self::$tracker = new static();
            self::$tracker->handle = self::connectToRedis();
            self::$tracker->key = $key;
            self::$tracker->expiry = $expiry;
        }
        return self::$tracker;
    }

    private static function connectToRedis()
    {
        $config = Config::get('tracker.config');
        $redis = new Client($config);
        $redis->connect();
        return $redis;
    }

    public function push($value)
    {
        $this->handle->rPush($this->key, $value);
        if (!$this->expirySet) {
            $this->handle->expire($this->key, $this->expiry);
            $this->expirySet = true;
        }

        return $this;
    }

    public function count()
    {
        return $this->handle->lLen($this->key);
    }

    public function all()
    {
        return $this->handle->lRange($this->key, 0, -1);
    }

    public function get($value)
    {
        $values = array_flip($this->all());
        return isset($values[$value]) ? $value : null;
    }

    public function has($value)
    {
        return !!$this->get($value);
    }

    public function nuke()
    {
        $this->handle->delete($this->key);
    }
}
