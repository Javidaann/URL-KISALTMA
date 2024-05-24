<?php

class controller
{
    private $urlModel;

    public function __construct($urlModel)
    {
        $this->urlModel = $urlModel;
    }

    public function shortenUrl($originalUrl)
    {
        if (!$this->isValidUrl($originalUrl)) {
            return ['error' => 'Invalid URL format'];
        }

        $existingUrl = $this->urlModel->findByOriginalUrl($originalUrl);
        if ($existingUrl) {
            return ['short_url' => $this->getShortUrl($existingUrl['short_code'])];
        }

        $shortCode = $this->generateShortCode();
        $this->urlModel->insert($originalUrl, $shortCode);
        return ['short_url' => $this->getShortUrl($shortCode)];
    }

    private function isValidUrl($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    private function generateShortCode()
    {
        return bin2hex(random_bytes(6));
    }

    private function getShortUrl($shortCode)
    {
        return 'http://yourdomain.com/' . $shortCode;
    }
}
