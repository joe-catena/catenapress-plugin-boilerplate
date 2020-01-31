<?php

namespace Catenamedia\Catenapress\Blocks;

use CasinoProvider;
use Catenamedia\Catenapress\Blocks\Adapter\AdapterACF;

/**
 * Class RendererFactory
 * @package Catenamedia\Catenapress\Blocks
 */
class RendererFactory
{

    /**
     * @return RendererBlockHTML
     * @throws \Exception
     */
    public static function createRendererACFHTML(): RendererBlockHTML
    {
        return new RendererBlockHTML(new CasinoProvider(new AdapterACF()));
    }
}