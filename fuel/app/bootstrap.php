<?php

// Bootstrap the framework DO NOT edit this
require_once COREPATH.'bootstrap.php';
$GLOBALS['query_profiler'] = array();


Autoloader::add_classes(array(
    'AdminMenu'               => APPPATH.'classes/include/adminmenu.php',
    'Gabarit'                 => APPPATH.'classes/include/gabarit.php',
    'Formulaire'              => APPPATH.'classes/include/formulaire.php',
    'Uri'                     => APPPATH.'classes/include/uri.php',

    'SqlProfiler'             => APPPATH.'classes/profiler/sqlProfiler.php',
    'FrontProfiler'           => APPPATH.'classes/profiler/frontProfiler.php'
));

// Register the autoloader
Autoloader::register();

// Initialize the framework with the config file.
Fuel::init(include(APPPATH.'config/config.php'));


/* End of file bootstrap.php */