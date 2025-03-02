<?php

declare(strict_types=1);

const INCLUDES_DIR = __DIR__ . '/../includes';
const ROUTE_DIR = __DIR__ . '/../router';
const TEMPLATES_DIR = __DIR__ . '/../templates';
const DATABASE_DIR = __DIR__ . '/../databases';

session_start();

require_once INCLUDES_DIR . '/router.php';
require_once INCLUDES_DIR . '/view.php';
require_once INCLUDES_DIR . '/db.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// เรียกใช้งาน dispatch() (ต้องมี router.php)
dispatch($uri, $method);
