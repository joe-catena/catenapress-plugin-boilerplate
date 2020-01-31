<?php

namespace Catenamedia\Catenapress\PluginExample\API\Example;

/**
 * Class ExampleControllerCallback
 * @package Catenamedia\Catenapress\Blocks\Controller\API\Example
 */
class ExampleGETCallback {

    /**
     * @param \WP_REST_Request $request
     * @return \WP_REST_Response
     */
    public function __invoke(\WP_REST_Request $request): \WP_REST_Response
    {
        return rest_ensure_response([]);
    }

}