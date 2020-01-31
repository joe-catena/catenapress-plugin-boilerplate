<?php

namespace Catenamedia\Catenapress\PluginExample\Service\Block;

use Catenamedia\Catenapress\PluginExample\Service\Block\Example\ExampleBlockRenderer;
use Catenamedia\Catenapress\PluginExample\Service\Casino\Adapter\AdapterACF;
use Catenamedia\Catenapress\PluginExample\Service\Casino\Provider\CasinoProvider;

/**
 * Class RendererFactory
 * @package Catenamedia\Catenapress\Blocks
 */
class BlockRendererFactory
{

    /**
     * @return ExampleBlockRenderer
     * @throws \Exception
     */
    public static function createExampleBlockRendererACF(): ExampleBlockRenderer
    {
        return new ExampleBlockRenderer(new CasinoProvider(new AdapterACF()));
    }
}