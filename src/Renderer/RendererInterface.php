<?php

namespace Catenamedia\Catenapress\Blocks\Render;

/**
 * Class Render
 * @package Catenamedia\Catenapress\Blocks\Render
 */
interface RendererInterface
{

    /**
     * @param array $attributes
     * @return string
     */
    public function render(array $attributes): string;
}