<?php

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

//paths info
define('APP_PATH', realpath(dirname(dirname(__FILE__))));
define('VIEWS_PATH', APP_PATH . DIRECTORY_SEPARATOR . 'views');
define('SITE_NAME', 'task');
