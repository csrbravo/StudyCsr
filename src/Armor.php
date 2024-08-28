<?php
interface Armor
{
    public function absorbDamage(int &$damage, Unit $unit): void;
}
