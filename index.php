<?php

declare(strict_types=1);

namespace App;

use App\Exception\AppException;
use Throwable;

require_once('./src/utils/debug.php');
require_once('./src/Controller.php');

$configuration = require_once('./config/config.php');

const BASE_URL = 'https://crm.lunadesign.pl/notes/';

$request = [
    'get' => $_GET,
    'post' => $_POST
];

try {
    Controller::initConfiguration($configuration);
    (new Controller($request))->run();
} catch (Throwable $e) {
    echo "<h1>Wystąpił błąd w aplikacji</h1>";
    echo '<h3>' . $e->getMessage() . '</h3>';
}





