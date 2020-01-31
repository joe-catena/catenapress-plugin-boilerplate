<?php

namespace Catenamedia\Catenapress\PluginExample\API\Example;

/**
 * Class ExampleGETSchemaCallback
 * @package Catenamedia\Catenapress\PluginExample\API\Example
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