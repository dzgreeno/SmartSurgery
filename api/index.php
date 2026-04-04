<?php

// Storage overrides for Vercel
putenv('VIEW_COMPILED_PATH=/tmp');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp';

// Optional: Force clear any lingering /tmp caches if the lambda was warm
foreach (['routes.php', 'config.php', 'services.php', 'packages.php', 'events.php'] as $f) {
    if (file_exists('/tmp/' . $f)) {
        @unlink('/tmp/' . $f);
    }
}

// Forward Vercel requests to normal index.php
require __DIR__ . '/../public/index.php';
