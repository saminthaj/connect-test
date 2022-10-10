<?php

namespace Src\AppHumanResources\Challenge;

class Challenge2Service
{
    public function __construct()
    {
    }

    public function __invoke()
    {
        $array = array(12, 43, 66, 21, 56, 43, 43, 78, 78, 100, 43, 43, 43, 21);
        return array_count_values($array);
    }
}
