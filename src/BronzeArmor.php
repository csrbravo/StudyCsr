<?php
class BronzeArmor implements Armor
{
    public function absorbDamage(&$damage)
    {
        $absorbed = $damage / 2;
        $damage -= $absorbed;
        echo "<p>La armadura absorbe {$absorbed} puntos de daño</p>";
    }
}
