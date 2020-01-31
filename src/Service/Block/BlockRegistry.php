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
            'example-block-editor-script',
            plugins_url('js/dist/editor.js', __FILE__),
            []
        );

        wp_register_script(
            'example-block-script',
            plugins_url('js/dist/script.js', __FILE__),
            []
        );

        wp_register_style(
            'example-block-editor-style',
            plugins_url('styles/dist/editor.css', __FILE__),
            array('wp-edit-blocks')
        );

        wp_register_style(
            'example-block-style',
            plugins_url('styles/dist/block.css', __FILE__)
        );

    }

    /**
     * Registers Gutenberg block
     */
    protected function registerBlocks()
    {
        register_block_type(
            'catenamedia/blocks/example-block',
            [
                'render_callback' => BlockRendererFactory::createExampleBlockRendererACF(),
                'editor_script' => 'example-block-editor-script',
                'editor_style' => 'example-block-editor-style',
                'script' => 'example-block-script',
                'style' => 'example-block-style',
                'attributes' => ['id' => ['type' => 'string']]
            ]
        );
    }
}