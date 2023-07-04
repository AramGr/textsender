<?php
require_once 'routes.php';

$url = parse_url($_SERVER['REQUEST_URI'])['path'];

if (!in_array($url, array_keys(Routes::ROUTES))) {
    header('Location: /');

    exit;

    // Todo: implement 404 not found page for this implementation
}