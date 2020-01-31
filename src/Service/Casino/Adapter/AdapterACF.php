<?php

namespace Catenamedia\Catenapress\PluginExample\Service\Casino\Adapter;

use Catenamedia\Catenapress\PluginExample\Entity\Casino;

/**
 * Class AdapterACF
 * @package Catenamedia\Catenapress\Blocks\Adapter
 */
class AdapterACF extends AdapterAbstract
{
    /**
     * AdapterACF constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        if (!function_exists('get_fields') || !function_exists('get_post')) {
            throw new \Exception('ACF fields not installed');
        }
    }

    /**
     * @param $id
     * @return Casino|null
     */
    public function getById($id): ?Casino
    {
        $post = get_post($id);

        if (!$post) {
            return null;
        }

        $fields = get_fields($post->ID);

        return $this->toCasino($post->ID, $post->post_title, $fields['bonus_1st']);
    }


}