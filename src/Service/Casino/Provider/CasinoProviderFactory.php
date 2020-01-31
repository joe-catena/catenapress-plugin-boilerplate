<?php
/**
 * Created by PhpStorm.
 * User: aleksandar
 * Date: 31/01/2020
 * Time: 16:16
 */

namespace Catenamedia\Catenapress\PluginExample\Service\Casino\Provider;


use Catenamedia\Catenapress\PluginExample\Service\Casino\Adapter\AdapterACF;
use Catenamedia\Catenapress\PluginExample\Service\Casino\Adapter\AdapterCatenaBrandsMS;
use Http\Adapter\Guzzle6\Client;
use Nyholm\Psr7\Factory\Psr17Factory;

class CasinoProviderFactory
{

    private const DEFAULT_HTTP_CLIENT_TIMEOUT_SECONDS = 1.0;

    /**
     * @return CasinoProvider
     * @throws \Exception
     */
    public static function createACFProvider(): CasinoProvider
    {
        return new CasinoProvider(new AdapterACF());
    }

    /**
     * @return CasinoProvider
     */
    public static function createCatenaProvider(): CasinoProvider
    {
        return new CasinoProvider(
            new AdapterCatenaBrandsMS(
                Client::createWithConfig(['timeout' => self::DEFAULT_HTTP_CLIENT_TIMEOUT_SECONDS]),
                new Psr17Factory(),
                getenv('LIVE_API')
            )
        );
    }
}