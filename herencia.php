<?php
require 'src/helpers.php';
require 'src/Unit.php';
require 'src/Soldier.php';
require 'src/Archer.php';
require 'src/Armor.php';
require 'src/BronzeArmor.php';
require 'src/SilverArmor.php';
require 'src/CursedArmor.php';

use StudyCsr\Archer;
use StudyCsr\Soldier;
use StudyCsr\BronzeArmor;
use StudyCsr\CursedArmor;


try {
    $Csr = new Archer('Cesar', new CursedArmor(), 100, 'red');
    $Jose = new Soldier('Jose', new BronzeArmor(), 100, 'blue');


    $Jose->attack($Csr);
    $Csr->attack($Jose);
    $Csr->move('right');
    $Jose->attack($Csr);
    $Jose->attack($Csr);

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}