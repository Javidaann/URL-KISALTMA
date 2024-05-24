<?php

require 'model.php';
require 'controller.php';

$dsn = 'sqlite:urls.db';
$db = new PDO($dsn);

$urlModel = new model($db);
$urlController = new controller($urlModel);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $originalUrl = $_POST['url'];
    $result = $urlController->shortenUrl($originalUrl);
    
    if (isset($result['error'])) {
        $error = $result['error'];
    } else {
        $shortUrl = $result['short_url'];
    }
}

include 'index.php';
