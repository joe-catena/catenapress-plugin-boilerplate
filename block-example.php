<?php

/**
 * Plugin name: Example Catenapress plugin
 */
require_once('vendor/autoload.php');

/**
 * Class BlockExample
 */
class PluginExample {


    /**
     * BlockExample constructor.
     */
    public function __construct()
    {
        $this->registerAPI();
        $this->registerBlocks();
    }

    /**
     * Registers gutenberg blocks
     */
    private function registerBlocks()
    {
        $blockRegistry = new  \Catenamedia\Catenapress\Blocks\Service\Block\BlockRegistry();
        $blockRegistry->register();
    }

    private function registerAPI()
    {
        add_action( 'rest_api_init', new \Catenamedia\Catenapress\Blocks\Controller\API\RouteRegistry());
    }
}

$block = new PluginExample();
add_action('init', new PluginExample());