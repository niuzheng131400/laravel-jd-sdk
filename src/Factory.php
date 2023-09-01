<?php

namespace Youer\LaravelJdSdk;

use Illuminate\Support\Arr;

use JDong\Application as Jd;

/**
 * @method Jd jingdong()
 */
class Factory
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @param $name
     * @param $arguments
     * @return void
     */
    public static function __callStatic($name, $arguments)
    {
        $object = self::getInstance();
        return $object->make($name, ...$arguments);
    }

    /**
     * @return Factory
     */
    private static function getInstance(): Factory
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    /**
     * @param $config
     * @return array|void
     */
    private function getConfig($config): array
    {
        if (empty($config)) {
            $config = config('jd.jd', []);
        }
        if (!array_key_exists('app_key', $config) ||
            !array_key_exists('app_secret', $config)) {
            throw new \InvalidArgumentException('app_key and app_secret is required');
        }
        return Arr::only($config, ['app_key', 'app_secret', 'format']);
    }

    /**
     * @param $name
     * @param array $config
     * @return mixed
     */
    private function make($name, array $config = [])
    {
        if ($name == 'jingdong') {
            $config = $this->getConfig($config);
            $c = new Jd();
            $c->appKey = $config['app_key'];
            $c->appSecret = $config['app_secret'];
            $c->format = $config['format'] ?? 'json';
            return $c;
        }
        return null;
    }
}
