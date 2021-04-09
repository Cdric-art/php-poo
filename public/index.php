<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

use App\Exceptions\NotFoundException;
use Router\Router;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPT', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

const DB_NAME = 'php_tuto';
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = 'root';

$router = new Router($_GET['url']);

$router->getUrl('/', 'App\Controllers\BlogController@welcome');
$router->getUrl('/posts', 'App\Controllers\BlogController@index');
$router->getUrl('/posts/:id', 'App\Controllers\BlogController@show');
$router->getUrl('/tags/:id', 'App\Controllers\BlogController@tag');

try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
