<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


function navActive($route)
{
    return headerActive($route) ? 'active' : '';
}

function headerActive($route)
{
    return strpos(Route::currentRouteName(), $route) === 0;
}

function isCollapsed($route)
{
    return headerActive($route) ? '' : 'collapsed';
}

function collapseShow($route)
{
    return headerActive($route) ? 'show' : '';
}
