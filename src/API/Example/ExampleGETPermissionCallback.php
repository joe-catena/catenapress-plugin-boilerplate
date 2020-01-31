<?php

namespace Catenamedia\Catenapress\PluginExample\API\Example;

/**
 * Class ExampleGETPermissionCallback
 * @package Catenamedia\Catenapress\PluginExample\API\Example
 */
class ExampleGETPermissionCallback {


    /**
     * Checks request permission
     *
     * @param \WP_REST_Request $request
     * @return bool|\WP_Error
     */
    public function __invoke(\WP_REST_Request $request)
    {
        if (!current_user_can( 'read' )) {
            return new \WP_Error(
                'rest_forbidden',
                esc_html__( 'You cannot view the resource.' ),
                ['status' => 400]
            );
        }

        return true;
    }

}