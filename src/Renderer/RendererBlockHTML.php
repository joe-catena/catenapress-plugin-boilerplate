<?php

namespace Catenamedia\Catenapress\Blocks;

use Catenamedia\Catenapress\Blocks\Render\RendererInterface;

/**
 * Class RenderBlockHTML
 * @package Catenamedia\Catenapress\Blocks
 */
class RendererBlockHTML implements RendererInterface
{

    /**
     * @var \CasinoProvider
     */
    private $provider;

    /**
     * RenderBlockHTML constructor.
     * @param \CasinoProvider $provider
     */
    public function __construct(\CasinoProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @param array $attributes
     * @return string
     */
    public function render(array $attributes): string
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