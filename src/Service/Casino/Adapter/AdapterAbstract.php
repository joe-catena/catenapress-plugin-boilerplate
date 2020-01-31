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

    /**
     * @param int $id
     * @param string $title
     * @param string $firstBonus
     * @return Casino
     */
    protected function toCasino(int $id, string $title, string $firstBonus) : Casino
    {
        $result = new Casino();
        $result->setId($id)
            ->setTitle($title)
            ->setFirstBonus($firstBonus)
        ;

        return $result;
    }

}