<?php
/**
 * Created by PhpStorm.
 * User: aleksandar
 * Date: 31/01/2020
 * Time: 11:01
 */

namespace Catenamedia\Catenapress\PluginExample\Service\Block\Example;

use Catenamedia\Catenapress\PluginExample\Service\Block\BlockRendererAbstract;
use Catenamedia\Catenapress\PluginExample\Service\Casino\Provider\CasinoProvider;

/**
 * Class ExampleBlockRendererCallback
 * @package Catenamedia\Catenapress\Blocks\Service\Renderer
 */
class ExampleBlockRenderer extends BlockRendererAbstract
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