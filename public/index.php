<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Controller\HomeController;
use Symfony\Component\DependencyInjection\ContainerBuilder;

$container = new ContainerBuilder();
$container
    ->register('mailer', 'App\Service\Mailer')
    ->addArgument('sendmail');

dump($container->get('mailer'));

$homeController = new HomeController();

$homeController->hello();
