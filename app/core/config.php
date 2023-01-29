<?php 

    define("WEBSITE_TITLE", "TECH ZONE");
    define("DB_NAME", "techzone");

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_TYPE", "mysql");
    define('DB_PASS', '');

    define("DEBUG", true);

    if(DEBUG){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }else{
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }