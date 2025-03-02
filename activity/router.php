<?php
const ALLOW_METHODS = ['GET', 'POST'];
const INDEX_URI = '';
const INDEX_ROUTE = 'home'; // เปลี่ยนจาก INDEX_ROUNTE ที่สะกดผิด

function normalizeUri(string $uri): string
{
    $uri = strtok($uri, '?');
    return strtolower(trim($uri, '/')) ?: INDEX_ROUTE;
}

function notFound()
{
    http_response_code(404);
    echo "404 Not Found";
    exit;
}

function getFilePath(string $uri, string $method): string
{
    return ROUTE_DIR . '/' . normalizeUri($uri) . '_' . strtolower($method) . '.php';
}

function dispatch(string $uri, string $method): void
{
    $uri = normalizeUri($uri);
        
    if (!in_array(strtoupper($method), ALLOW_METHODS)) {
        notFound();
    }

    $filePath = getFilePath($uri, $method);
    
    if (file_exists($filePath)) {
        include($filePath);
        return;
    }

    notFound();
}
