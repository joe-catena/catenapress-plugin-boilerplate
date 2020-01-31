<?php

namespace Catenamedia\Catenapress\PluginExample\Service\Block;

use Catenamedia\Catenapress\PluginExample\Service\Block\Example\ExampleBlockRenderCallback;
use Catenamedia\Catenapress\PluginExample\Service\Casino\Adapter\AdapterACF;
use Catenamedia\Catenapress\PluginExample\Service\Casino\Provider\CasinoProvider;

/**
 * Class BlockRendererFactory
 * @package Catenamedia\Catenapress\PluginExample\Service\Block
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