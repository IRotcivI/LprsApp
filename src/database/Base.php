<?php

namespace Database;

use PDO;

class Base
{
    private $bdd;

    public function __construct()
    {
        $this ->bdd = new PDO('mysql:host=localhost:3306;dbname=lprs_app;charset=utf8', 'root', '');
    }

    public function getBdd()
    {
        return $this->bdd;
    }
}