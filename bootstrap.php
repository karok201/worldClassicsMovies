<?php

session_start();

const KOL = 10;
define('APP_DIR', $_SERVER['DOCUMENT_ROOT']);
define('VIEW_DIR', $_SERVER['DOCUMENT_ROOT'] . '/src/View/');

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/vendor/autoload.php';
