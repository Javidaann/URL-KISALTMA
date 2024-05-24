<?php

$dsn = 'sqlite:urls.db';
$db = new PDO($dsn);

$db->exec("CREATE TABLE IF NOT EXISTS urls (
    id INTEGER PRIMARY KEY,
    original_url TEXT NOT NULL,
    short_code TEXT NOT NULL
)");
