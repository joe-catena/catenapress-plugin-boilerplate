<?php

namespace Catenamedia\Catenapress\PluginExample\Service\Block;

use Catenamedia\Catenapress\PluginExample\Service\Block\Casino\CasinoCardRenderCallback;
use Catenamedia\Catenapress\PluginExample\Service\Casino\Provider\CasinoProviderFactory;

/**
 * Class BlockRendererFactory
 * @package Catenamedia\Catenapress\PluginExample\Service\Block
 */
class BlockRendererFactory
{

    /**
     * @return CasinoCardRenderCallback
     * @throws \Exception
     */
    public static function createCasinoCardRendererACF(): CasinoCardRenderCallback
    {
        return new CasinoCardRenderCallback(CasinoProviderFactory::createACFProvider());
    }

    /**
     * @return CasinoCardRenderCallback
     * @throws \Exception
     */
    public static function createCasinoCardRendererCatena(): CasinoCardRenderCallback
    {
        return new CasinoCardRenderCallback(CasinoProviderFactory::createCatenaProvider());
    }
}