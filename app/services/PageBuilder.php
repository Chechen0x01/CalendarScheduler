<?php

namespace app\services;

class PageBuilder
{
    public static function part(string $part_name)
    {
        require_once 'views/components/' . $part_name . '.php';
    }
}