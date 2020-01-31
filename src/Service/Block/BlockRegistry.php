<?php

namespace Catenamedia\Catenapress\PluginExample\Service\Block;

/**
 * Class BlockRegistry
 * @package Catenamedia\Catenapress\PluginExample\Service\Block
 */
class BlockRegistry
{

    /**
     * Registers block
     */
    public function register()
    {
        add_action('enqueue_block_editor_assets', [$this, 'registerScriptsCallback']);
        $this->registerBlocks();
    }

    /**
     * Registers necessary JS and CSS
     */
    public function registerScriptsCallback()
    {
        wp_register_script(
            'casino-card-block-editor-script',
            plugins_url('js/dist/editor.js', __FILE__),
            []
        );

        wp_register_script(
            'casino-card-block-script',
            plugins_url('js/dist/script.js', __FILE__),
            []
        );

        wp_register_style(
            'casino-card-block-editor-style',
            plugins_url('styles/dist/editor.css', __FILE__),
            array('wp-edit-blocks')
        );

        wp_register_style(
            'casino-card-block-style',
            plugins_url('styles/dist/block.css', __FILE__)
        );

    }

    /**
     * Registers Gutenberg block
     */
    protected function registerBlocks()
    {
        register_block_type(
            'catenamedia/blocks/casino-card-wp-data',
            [
                'render_callback' => BlockRendererFactory::createCasinoCardRendererACF(),
                'editor_script' => 'casino-card-block-editor-script',
                'editor_style' => 'casino-card-block-editor-style',
                'script' => 'casino-card-block-script',
                'style' => 'casino-card-block-style',
                'attributes' => ['id' => ['type' => 'string']]
            ]
        );
        register_block_type(
            'catenamedia/blocks/casino-card-brands-ms-data',
            [
                'render_callback' => BlockRendererFactory::createCasinoCardRendererCatena(),
                'editor_script' => 'casino-card-block-editor-script',
                'editor_style' => 'casino-card-block-editor-style',
                'script' => 'casino-card-block-script',
                'style' => 'casino-card-block-style',
                'attributes' => ['id' => ['type' => 'string']]
            ]
        );
    }
}