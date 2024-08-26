<?php
class SilverArmor implements Armor
{
    public function absorbDamage(&$damage)
    {
        $absorbed = $damage / 5;
        $damage -= $absorbed;
        echo "<p>La armadura absorbe {$absorbed} puntos de daño</p>";
    }
}
