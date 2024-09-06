<?php

namespace StudyCsr;

interface Armor {
    public function absorbDamage(int $damage): int;
}
