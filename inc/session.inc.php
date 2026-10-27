<?php

$sessionLifetime = 60 * 60 * 12;

ini_set('session.gc_maxlifetime', $sessionLifetime);
session_set_cookie_params([
    'lifetime' => $sessionLifetime,
    'httponly' => true,
    'samesite' => 'Lax',
]);

session_start();
