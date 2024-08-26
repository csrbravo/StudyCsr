<?php
class CursedArmor implements Armor
{
    public function absorbDamage(&$damage)
    {
        $take = $damage * 2;
        $damage = $take;
        echo "<p>La armadura duplico los {$take} puntos de daño</p>";
    }
}
