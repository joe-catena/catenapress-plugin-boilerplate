<?php

namespace Catenamedia\Catenapress\PluginExample\API\Example;

/**
 * Class ExampleGETCallback
 * @package Catenamedia\Catenapress\PluginExample\API\Example
 */
class CasinoGETCallback {

    /**
     * @param \WP_REST_Request $request
     * @return \WP_REST_Response
     */
    public function __invoke(\WP_REST_Request $request): \WP_REST_Response
    {
        return \rest_ensure_response([]);
    }

}