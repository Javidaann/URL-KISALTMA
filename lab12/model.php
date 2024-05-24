<?php

class model
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function findByOriginalUrl($originalUrl)
    {
        $stmt = $this->db->prepare("SELECT * FROM urls WHERE original_url = :original_url");
        $stmt->execute([':original_url' => $originalUrl]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByShortCode($shortCode)
    {
        $stmt = $this->db->prepare("SELECT * FROM urls WHERE short_code = :short_code");
        $stmt->execute([':short_code' => $shortCode]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($originalUrl, $shortCode)
    {
        $stmt = $this->db->prepare("INSERT INTO urls (original_url, short_code) VALUES (:original_url, :short_code)");
        $stmt->execute([':original_url' => $originalUrl, ':short_code' => $shortCode]);
        return $this->db->lastInsertId();
    }
}
