<?php

namespace Catenamedia\Catenapress\Blocks\Registry;

/**
 * Class BlockRegistry
 * @package Catenamedia\Catenapress\Blocks\Registry
 */
class BlockRegistryDefault extends BlockRegistry
{

    /**
     * Registers block
     */
    public function register()
    {
        self::registerScripts();
        $this->registerBlock();
    }

    /**
     * Registers necessary JS and CSS
     */
    protected static function registerScripts()
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
    protected function registerBlock()
    {
        register_block_type(
            'catenamedia/blocks/example-block',
            [
                'render_callback' => [$this, 'renderCallback'],
                'editor_script' => 'example-block-editor-script',
                'editor_style' => 'example-block-editor-style',
                'script' => 'example-block-script',
                'style' => 'example-block-style',
                'attributes' => ['id' => ['type' => 'string']]
            ]
        );
    }

    /**
     * @param array $attributes
     * @return string
     */
    public function renderCallback(array $attributes): string
    {
        try {
            $render = \Catenamedia\Catenapress\Blocks\RendererFactory::createRendererACFHTML();
        } catch (\Exception $ex) {
            error_log($ex->getMessage()."\n".$ex->getTraceAsString());

            return '<div class="error">Cannot load Casino</div>';
        }

        return $render->render($attributes);
    }
}