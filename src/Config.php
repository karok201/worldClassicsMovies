<?php

namespace App;

final class Config
{
    private array $configs = [];
    public function get($key, $default = null)
    {
        return array_get($this->configs, $key);
    }
    public function load()
    {
        $files = scandir($_SERVER['DOCUMENT_ROOT'] . '/configs');
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
               $configs = include $_SERVER['DOCUMENT_ROOT'] . '/configs/' . $file;
               $file = substr($file, 0, -4);
               foreach ($configs as $key => $config) {
                   $this->configs[$file][$key] = $config;
               }
            }
        }
    }
    /** @var Config */
    private static Config $instance;
    public static function getInstance(): Config
    {
        if (null === Config::$instance) {
            Config::$instance = new Config();
        }
        return Config::$instance;
    }
    public function __construct() {
        $this->load();
    }
    private function __clone() {}
    public function __wakeup() {}
}