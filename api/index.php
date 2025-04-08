<?php
// Set the base path for the Laravel application
$basePath = realpath(__DIR__ . '/../cms');

// Change current directory to the Laravel root
chdir($basePath);

// Load the Laravel application
require $basePath . '/public/index.php'; 