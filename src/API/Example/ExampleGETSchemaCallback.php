<?php

namespace Catenamedia\Catenapress\PluginExample\Controller\API\Example;

/**
 * Class ExampleControllerSchemaCallback
 * @package Catenamedia\Catenapress\Blocks\Controller\API\Example
 */
class ExampleGETSchemaCallback {


    /**
     * Returns schema
     *
     * @param \WP_REST_Request $request
     * @return array
     */
    public function __invoke(\WP_REST_Request $request): array
    {
        return [];
    }
}