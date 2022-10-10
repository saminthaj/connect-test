<?php

namespace Src\AppHumanResources\Challenge;

class groupByOwnersService
{
    public function __construct()
    {
    }

    public function __invoke(array $details)
    {
        $data = array();
        foreach ($details as $key => $detail) {
            if (array_key_exists($detail, $data)) {
                $data[$detail][] = $key;
            } else {
                $data[$detail] = [$key];
            }
        }
        return $data;
    }
}
