<?php

namespace Catenamedia\Catenapress\Blocks\API;

use Catenamedia\Catenapress\PluginExample\API\Example\ExampleGETCallback;
use Catenamedia\Catenapress\PluginExample\API\Example\ExampleGETPermissionCallback;
use Catenamedia\Catenapress\PluginExample\API\Example\ExampleGETSchemaCallback;

/**
 * Class RouteRegistry
 * @package Catenamedia\Catenapress\Blocks\Controller\API
 */
class RouteRegistryCallback
{

    /**
     * Register API routes for Example namespace
     */
    public function __invoke() {
        register_rest_route(
            '/example-route/example',
            'route-name',
            [
                [
                    'methods'   => 'GET',
                    'callback'  => new ExampleGETCallback(),
                    'permission_callback' => new ExampleGETPermissionCallback(),
                ],
                'schema' => new ExampleGETSchemaCallback()
            ]
        );
    }
}