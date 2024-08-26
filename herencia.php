<?php
require 'src/helpers.php';
require 'src/Unit.php';
require 'src/Soldier.php';
require 'src/Archer.php';
require 'src/Armor.php';
require 'src/BronzeArmor.php';
require 'src/SilverArmor.php';
require 'src/CursedArmor.php';

try {

    $Csr = new Archer('Cesar');
    $Csr->move('el norte');
    $Jose = new Soldier('Jose');
    $armor = new BronzeArmor();
    $Jose->move('el sur');
    $Csr->attack($Jose);
    $Jose->setArmor($armor);
    $Jose->attack($Csr);
    $armor = new CursedArmor();
    $Csr->setArmor($armor);
    $Jose->attack($Csr);
    $Csr->move('el este');
    $Jose->attack($Csr);
    $Jose->attack($Csr);
    $Jose->attack($Csr);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}