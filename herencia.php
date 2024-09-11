<?php
require 'vendor/autoload.php';

use StudyCsr\Unit;
use StudyCsr\Weapons\BasicBow;
use StudyCsr\Weapons\BasicSword;
use StudyCsr\BronzeArmor;
use StudyCsr\CombatSystem;
use StudyCsr\Weapons\Translator;

try {

    $translationsFile = __DIR__ . '/translations.php';
    if (!file_exists($translationsFile)) {
        throw new Exception("El archivo de traducciones no existe: $translationsFile");
    }
    $translations = require $translationsFile;
    if (!is_array($translations)) {
        throw new Exception("El archivo de traducciones no devuelve un array");
    }
    Translator::set($translations);

    $sword = new BasicSword();
    $bow = new BasicBow();
    $bronzeArmor = new BronzeArmor();

    $soldier = new Unit("Csr", $sword, 100);
    $soldier->setArmor($bronzeArmor);

    $archer = new Unit("Jose", $bow, 80);

    echo "<h1>Combat between {$soldier->getName()} and {$archer->getName()}</h1>";
    echo "<p>{$soldier->getName()}: Soldier with {$sword->getDescription()} and bronze armor</p>";
    echo "<p>{$archer->getName()}: Archer with {$bow->getDescription()}</p>";
    echo "<hr>";

    $combat = new CombatSystem();
    $combat->battle($soldier, $archer);

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
