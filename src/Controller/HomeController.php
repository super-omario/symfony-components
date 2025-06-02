<?php

namespace App\Controller;

class HomeController
{
    public function hello(): void
    {
        echo __DIR__.'<br>';
        echo 'Symfony Components';
    }
}
