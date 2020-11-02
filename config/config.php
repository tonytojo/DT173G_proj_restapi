<?php
$devMode = true;

if ($devMode) {
    define('DB_HOST', "localhost");
    define('DB_USER', "tony");
    define('DB_PASSWORD', "Pissen30060");
    define('DB_DSN', "dt173g_projekt");
} 
else 
{
    define('DB_HOST', "studentmysql.miun.se");
    define('DB_USER', "tojo8500");
    define('DB_PASSWORD', "1xd4phin");
    define('DB_DSN', "tojo8500");
}

// Activate autoload to speed up registering of classes needed
spl_autoload_register(function ($class) 
{
    include 'classes/' . $class . '.class.php';
});

