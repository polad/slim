<?php
$APP_ROUTES = array(
                    array('method' => 'GET',
                          'url' => '/test/',
                          'handler' => 'TestController::index'),
                    array('method' => 'GET',
                          'url' => '/test/:id/',
                          'handler' => 'TestController::set')
                    );
