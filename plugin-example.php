<?php

/**
 * Plugin name: Example Catenapress plugin
 */

require_once('vendor/autoload.php');

/**
 * Class PluginExample
 */
class PluginExample {


    /**
     * PluginExample constructor.
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
        $blockRegistry = new \Catenamedia\Catenapress\PluginExample\Service\Block\BlockRegistry();
        $blockRegistry->register();
    }

    /**
     * Registers API routes
     */
    private function registerAPI()
    {
        add_action( 'rest_api_init', new \Catenamedia\Catenapress\Blocks\API\RouteRegistryCallback());
    }
}

$block = new PluginExample();
add_action('init', new PluginExample());