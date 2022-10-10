<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\AppHumanResources\Challenge\Challenge2Service;
use Src\AppHumanResources\Challenge\groupByOwnersService;

class ChallengeController extends Controller
{
    public function challenge2()
    {
        $service = new Challenge2Service();
        return $service();
    }

    public function challenge4()
    {
        $service = new groupByOwnersService();
        return $service(["insurance.txt" => "Company A", "letter.docx" => "Company A", "Contract.docx" => "Company B"]);
    }
}
