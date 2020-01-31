<?php

namespace Catenamedia\Catenapress\PluginExample\Entity;


/**
 * Class Casino
 * @package Catenamedia\Catenapress\PluginExample\Entity
 */
class Casino
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $firstBonus;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Casino
     */
    public function setId(int $id): Casino
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Casino
     */
    public function setTitle(string $title): Casino
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstBonus(): string
    {
        return $this->firstBonus;
    }

    /**
     * @param string $firstBonus
     * @return Casino
     */
    public function setFirstBonus(string $firstBonus): Casino
    {
        $this->firstBonus = $firstBonus;

        return $this;
    }


    /**
     * @param $title
     * @param $firstBonus
     * @return Casino
     */
    public static function toCasino($id, string $title, string $firstBonus): Casino
    {
        $casino =  new Casino();
        $casino->setId($id)
            ->setFirstBonus($firstBonus)
            ->setTitle($title)
        ;
        return $casino;
    }



}