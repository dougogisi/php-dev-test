<?php

use Src\Application;

require __DIR__ . '/vendor/autoload.php';

$code = Application::run();
if ($code > 0) {
    echo "Application exited with non zero code " . $code . PHP_EOL;
} else {
    echo "Application completed" . PHP_EOL;
}
