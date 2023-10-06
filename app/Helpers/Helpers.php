<?php

if (!function_exists('currentRouteIn')) {
    /**
     * Check if the current route equals one of the provided routes.
     *
     * @param array|string $route
     * @return bool
     */
    function currentRouteIn(array|string $route)
    {
        if (is_array($route)) {
            return in_array(\Illuminate\Support\Facades\Route::currentRouteName(), $route);
        }
        return \Illuminate\Support\Facades\Route::currentRouteName() == $route;
    }
}
