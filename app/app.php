<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Store.php";
    require_once __DIR__."/../src/Brand.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost:8889;dbname=shoe_store';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' =>__DIR__.'/../views'
    ));
    
    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();
