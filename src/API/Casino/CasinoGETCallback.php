<?php

namespace Catenamedia\Catenapress\PluginExample\API\Example;

use Catenamedia\Catenapress\PluginExample\Service\Casino\Provider\CasinoProvider;

/**
 * Class ExampleGETCallback
 * @package Catenamedia\Catenapress\PluginExample\API\Example
 */
class CasinoGETCallback {

    /**
     * @var CasinoProvider
     */
    private $provider;

    /**
     * CasinoGETCallback constructor.
     * @param CasinoProvider $provider
     */
    public function __construct(CasinoProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @param \WP_REST_Request $request
     * @return \WP_REST_Response
     */
    public function __invoke(\WP_REST_Request $request): \WP_REST_Response
    {
        $casino = $this->provider->getById($request->get_param('id'));
        if ($casino) {
            // return response for casino
        } else {
            // return 404 \WP_Rest_Response or something appropriate
        }
    }

}