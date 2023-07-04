<?php
session_start();

// Todo: implement autoloader instead
$controller = Routes::ROUTES[$url]['controllerClass'];
$method = Routes::ROUTES[$url]['method'];

function sortBaseToComeFirst(array &$files)
{
    $result = [];
    foreach ($files as $file) {
        if (str_starts_with($file, 'Base')) {
            array_unshift($result, $file);
        } else {
            $result[] = $file;
        }
    }

    $files = $result;
}

function sortInterfaceToComeFirst(array &$files)
{
    $result = [];
    foreach ($files as $file) {
        if (strpos($file, 'Interface') !== false) {
            array_unshift($result, $file);
        } else {
            $result[] = $file;
        }
    }

    $files = $result;
}

$directories = ['models', 'controllers', 'services', 'helpers', 'senders'];

foreach ($directories as $directory) {
    $modelFiles = array_diff(scandir($directory), array('.', '..'));
    sortBaseToComeFirst($modelFiles);
    sortInterfaceToComeFirst($modelFiles);
    foreach ($modelFiles as $modelFile) {
        require_once "$directory/" . $modelFile;
    }
}

$process = new $controller();
$process->$method();
