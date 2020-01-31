<?php

namespace Catenamedia\Catenapress\Blocks\Registry;

/**
 * Class BlockRegistry
 * @package Catenamedia\Catenapress\Blocks\Registry
 */
abstract class BlockRegistry
{

    /**
     * Registers block
     */
    public function register()
    {
        self::registerScripts();
        $this->registerBlock();
    }

    /**
     * Registers necessary JS and CSS
     */
    abstract protected static function registerScripts();

    /**
     * Registers Gutenberg block
     */
    abstract protected function registerBlock();

    /**
     * @param array $attributes
     * @return string
     */
    abstract public function renderCallback(array $attributes): string;
}