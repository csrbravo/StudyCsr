<?php
require 'vendor/autoload.php';

use StudyCsr\Unit;
use StudyCsr\Weapons\BasicBow;
use StudyCsr\Weapons\BasicSword;
use StudyCsr\BronzeArmor;
use StudyCsr\CombatSystem;

try {
    $sword = new BasicSword();
    $bow = new BasicBow();
    $bronzeArmor = new BronzeArmor();

    $soldier = new Unit("Csr", $sword, 100);
    $soldier->setArmor($bronzeArmor);

    $archer = new Unit("Jose", $bow, 80);

    echo "<h1>Combate entre {$soldier->getName()} y {$archer->getName()}</h1>";
    echo "<p>{$soldier->getName()}: Soldado con {$sword->getDescription()} y armadura de bronce</p>";
    echo "<p>{$archer->getName()}: Arquero con {$bow->getDescription()}</p>";
    echo "<hr>";

    $combat = new CombatSystem();
    $combat->battle($soldier, $archer);

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
