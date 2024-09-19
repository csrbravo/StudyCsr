<?php

require 'vendor/autoload.php';

use StudyCsr\User;

$user = new User();

$user->fill([
    'first_name' => 'Duilio',
    'last_name' => 'Palacios',
]);

$user->nickname = 'Silence';

unset($user->nickname);

echo "<p>Bienvenido {$user->first_name} {$user->last_name}</p>";

if (isset ($user->nickname)) {
    echo "<p>Nickname: {$user->nickname}</p>";
}
