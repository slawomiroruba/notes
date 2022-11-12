<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

function dump($data)
{
    echo '<br><div class="container mx-auto"><div class="bg-gray-200 text-gray-800 inline-block p-2 mb-1 border border-gray-500" ><pre>';
    print_r($data);
    echo '</pre></div></div><br>';
}