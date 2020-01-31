<?php

namespace Catenamedia\Catenapress\Blocks\API;

use Catenamedia\Catenapress\PluginExample\API\Example\CasinoGETCallback;
use Catenamedia\Catenapress\PluginExample\API\Example\CasinoGETPermissionCallback;
use Catenamedia\Catenapress\PluginExample\API\Example\CasinoGETSchemaCallback;

/**
 * Class RouteRegistryCallback
 * @package Catenamedia\Catenapress\Blocks\API
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
                    'callback'  => new CasinoGETCallback(),
                    'permission_callback' => new CasinoGETPermissionCallback(),
                ],
                'schema' => new CasinoGETSchemaCallback()
            ]
        );
    }
}