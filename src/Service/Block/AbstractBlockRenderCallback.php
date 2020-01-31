<?php

namespace Catenamedia\Catenapress\PluginExample\Service\Block;

/**
 * Interface BlockRendererInterface
 * @package Catenamedia\Catenapress\Blocks\Service\Block\Renderer
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