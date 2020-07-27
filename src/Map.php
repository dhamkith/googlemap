<?php


namespace Dhamkith\Googlemap;


class Map
{
    /**
     * check if googlemap config file has been published and set.
     *
     * @return bool
     */
    public function configNotPublished()
    {
        return is_null(config('googlemap'));
    }

    /**
     * Get the currently set URL path for the map.
     *
     * @return String
     */
    public function path()
    {
        return config('googlemap.path', 'map');
    }
}
