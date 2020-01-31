<?php

namespace Catenamedia\Catenapress\PluginExample\Service\Casino\Adapter;

use Catenamedia\Catenapress\PluginExample\Entity\Casino;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

/**
 * Class AdapterCatenaBrandsMS
 * @package Catenamedia\Catenapress\PluginExample\Service\Casino\Adapter
 */
class AdapterCatenaBrandsMS extends AdapterAbstract
{

    private const HTTP_OK = 200;
    private const RECORD_STATUS_SUCCESS = 'success';

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * AdapterCatena constructor.
     * @param ClientInterface $client
     * @param RequestFactoryInterface $requestFactory
     * @param string $baseUrl
     */
    public function __construct(ClientInterface $client, RequestFactoryInterface $requestFactory, string $baseUrl)
    {
        $this->client = $client;
        $this->requestFactory = $requestFactory;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param $id
     * @return Casino|null
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \Exception
     */
    public function getById($id): ?Casino
    {
        $request = $this->requestFactory->createRequest('GET', $this->generateUri($id));

        $response = $this->client->sendRequest($request);
        if ($response->getStatusCode() !== self::HTTP_OK) {
            throw new \Exception('ERROR: Brand MS Request: ' . $request->getRequestTarget()
                . ' returned HTTP response code: ' . $response->getStatusCode()
            );
        }

        $responseRaw = (string)$response->getBody();

        if (strlen($responseRaw) <= 0) {
            return null;
        }

        $responseObj = \json_decode($responseRaw);

        return $this->parseResponse($responseObj);

    }

    /**
     * @param string $id
     * @return string
     */
    private function generateUri(string $id): string
    {
        return rtrim($this->baseUrl, " \/\n") . '/brands/'. $id;
    }

    /**
     * @param \stdClass $responseObj
     * @return Casino|null
     */
    private function parseResponse(\stdClass $responseObj): ?Casino
    {
        if ($responseObj->status != self::RECORD_STATUS_SUCCESS || !isset($responseObj->data, $responseObj->data->items[0])) {
            return null;
        }

        $casino = $responseObj->data->items[0];

        if (isset($casino->id, $casino->title, $casino->firstBonus)) {
            return Casino::toCasino($casino->id, $casino->title, $casino->firstBonus);
        }

        return null;
    }

}