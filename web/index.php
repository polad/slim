<?php
require_once '../app/ServiceContainer.php';
require_once '../vendor/Slim/Slim.php';
require_once '../app/Bootstrap.php';
require_once '../app/config/routes.php';

$diContainer = new ServiceContainer();

$bootstrap = new Bootstrap($diContainer, $APP_ROUTES);

$diContainer->getApp()->run();
