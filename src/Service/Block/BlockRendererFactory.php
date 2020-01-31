<?php

namespace Catenamedia\Catenapress\PluginExample\Service\Block;

use Catenamedia\Catenapress\PluginExample\Service\Block\Example\ExampleBlockRenderCallback;
use Catenamedia\Catenapress\PluginExample\Service\Casino\Adapter\AdapterACF;
use Catenamedia\Catenapress\PluginExample\Service\Casino\Provider\CasinoProvider;

/**
 * Class RendererFactory
 * @package Catenamedia\Catenapress\Blocks
 */
class BlockRendererFactory
{

    /**
     * @return ExampleBlockRenderCallback
     * @throws \Exception
     */
    public static function createExampleBlockRendererACF(): ExampleBlockRenderCallback
    {
        return new ExampleBlockRenderCallback(new CasinoProvider(new AdapterACF()));
    }
}