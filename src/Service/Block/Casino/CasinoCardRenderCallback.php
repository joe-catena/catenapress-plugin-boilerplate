<?php

namespace Catenamedia\Catenapress\PluginExample\Service\Block\Casino;

use Catenamedia\Catenapress\PluginExample\Service\Block\AbstractBlockRenderCallback;
use Catenamedia\Catenapress\PluginExample\Service\Casino\Provider\CasinoProvider;

/**
 * Class ExampleBlockRenderCallback
 * @package Catenamedia\Catenapress\PluginExample\Service\Block\Example
 */
class CasinoCardRenderCallback extends AbstractBlockRenderCallback
{

    /**
     * @var CasinoProvider
     */
    private $provider;

    /**
 * ExampleBlockRendererCallback constructor.
 * @param CasinoProvider $provider
 */
    public function __construct(CasinoProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @param array $attributes
     * @return string
     */
    protected function render(array $attributes): string
    {
        if (!isset($attributes['id'])) {
            $this->renderNoCasino();
        }
        $casino =  $this->provider->getById($attributes['id']);

        if (!$casino) {
            $this->renderNoCasino();
        }
        return '<div class="casino-block">'
            . '<h4 class="casino-block-title">' . $casino->getTitle() .'</h4>'
            . '<p class>' . $casino->getFirstBonus() .'</p>'
            . '</div>';
    }

    /**
     * @return string
     */
    private function renderNoCasino(): string
    {
        return '<div>No casino</div>';
    }
}