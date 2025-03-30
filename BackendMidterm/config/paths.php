<?php
// config/paths.php

// Define absolute path to project root
define('ROOT_PATH', dirname(__DIR__));

// Define all key directories
define('MODELS_PATH', ROOT_PATH . '/models');
define('CONTROLLERS_PATH', ROOT_PATH . '/controllers');
define('VIEWS_PATH', ROOT_PATH . '/views');
define('ADMIN_PATH', ROOT_PATH . '/admin');
define('CONFIG_PATH', ROOT_PATH . '/config');

// For admin section
define('ADMIN_CONTROLLERS_PATH', ADMIN_PATH . '/controllers');
define('ADMIN_VIEWS_PATH', ADMIN_PATH . '/views');
?>