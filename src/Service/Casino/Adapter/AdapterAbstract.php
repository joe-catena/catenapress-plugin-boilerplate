<?php

namespace Catenamedia\Catenapress\PluginExample\Service\Casino\Adapter;

use Catenamedia\Catenapress\PluginExample\Entity\Casino;

/**
 * Class AdapterAbstract
 * @package Catenamedia\Catenapress\PluginExample\Service\Casino\Adapter
 */
abstract class AdapterAbstract
{

    /**
     * @param $id
     * @return Casino|null
     */
    abstract public function getById($id): ?Casino;

}