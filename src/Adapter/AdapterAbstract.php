<?php

namespace Catenamedia\Catenapress\Blocks\Adapter;

use Catenamedia\Catenapress\Blocks\Entity\Casino;

/**
 * Class AdapterAbstract
 * @package Catenamedia\Catenapress\Blocks\Adapter
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