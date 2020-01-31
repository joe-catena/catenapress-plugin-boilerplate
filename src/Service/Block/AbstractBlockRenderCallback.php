<?php

namespace Catenamedia\Catenapress\PluginExample\Service\Block;

/**
 * Class AbstractBlockRenderCallback
 * @package Catenamedia\Catenapress\PluginExample\Service\Block
 */
abstract class AbstractBlockRenderCallback
{

    /**
     * @param array $attributes
     * @return string
     */
    public function __invoke(array $attributes) : string
    {
        return $this->render($attributes);
    }

    /**
     * @param array $attributes
     * @return string
     */
    abstract protected function render(array $attributes): string;
}