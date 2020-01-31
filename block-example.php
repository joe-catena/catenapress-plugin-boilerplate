<?php

require_once('vendor/autoload.php');

/**
 * Class BlockExample
 */
class BlockExample {


    public function __invoke()
    {
        $registry = new \Catenamedia\Catenapress\Blocks\Registry\BlockRegistryDefault();
        $registry->register();
    }

}

$block = new BlockExample();
add_action('init', $block());