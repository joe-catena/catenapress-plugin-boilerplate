<?php

use \Catenamedia\Catenapress\Blocks\Adapter\AdapterAbstract;
use Catenamedia\Catenapress\Blocks\Entity\Casino;

/**
 * Class CasinoProvider
 */
class CasinoProvider
{

    /**
     * @var AdapterAbstract
     */
    private $adapter;

    /**
     * CasinoProvider constructor.
     * @param AdapterAbstract $adapter
     */
    public function __construct(AdapterAbstract $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param $id
     * @return Casino|null
     */
    public function getById($id): ?Casino
    {
        return $this->adapter->getById($id);
    }
}