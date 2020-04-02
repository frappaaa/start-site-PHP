<?php

ob_start(); // output buffering is turned on



  // Assign file paths to PHP constants
  // __FILE__ returns the current path to this file
  // dirname() returns the path to the parent directory
  define("PROJECT_FILES_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PROJECT_FILES_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/shared/public');
  define("PRIVATE_PATH", PROJECT_PATH . '/shared/private');
  define("SHARED_PATH", PROJECT_PATH . '/shared');
  define("ASSETS_PATH", PROJECT_PATH . '/assets');
  define("ADMIN_PATH", PROJECT_PATH . '/admin');
  
  
  // Assign the root URL to a PHP constant
  // * Do not need to include the domain
  // * Use same document root as webserver
  // * Can set a hardcoded value:
  // define("WWW_ROOT", '/~kevinskoglund/globe_bank/public');
  // define("WWW_ROOT", '');
  // * Can dynamically find everything in URL up to "/public"
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/') + 9;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);
  
  
require_once('functions.php');
require_once('database.php');
require_once('query_functions.php');
require_once('validation_functions.php');
require_once('auth_functions.php');

// Autoload class definitions
function my_autoload($class) {
  if(preg_match('/\A\w+\Z/', $class)) {
    include('classes/' . $class . '.class.php');
  }
}
spl_autoload_register('my_autoload');

$db = db_connect();
DatabaseObject::set_database($db);

$session = new Session;


/*
  echo "PROJECT FILES PATH: ". PROJECT_FILES_PATH ."<br>";
  echo "PROJECT PATH: ". PROJECT_PATH."<br>";
  echo "PUBLIC PATH: ". PUBLIC_PATH."<br>";
  echo "PRIVATE PATH: ". PRIVATE_PATH."<br>";
  echo "SHARED PATH: ". SHARED_PATH."<br>";
  echo "ASSETS PATH: ". ASSETS_PATH."<br>";
  echo "ADMIN PATH: ". ADMIN_PATH."<br>";
  echo $_SERVER['SCRIPT_NAME']."<br>";
  echo "public end: ". $public_end ."<br>";
  echo "doc root: ".$doc_root."<br>";
  echo "WWW_ROOT".WWW_ROOT."<br>"; */


?>