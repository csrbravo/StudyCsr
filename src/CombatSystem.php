<?php

namespace StudyCsr;

class CombatSystem {
    public function battle(Unit $unit1, Unit $unit2): void {
        $currentAttacker = $unit1;
        $currentDefender = $unit2;

        while ($unit1->getHp() > 0 && $unit2->getHp() > 0) {
            $currentAttacker->attack($currentDefender);
            $this->displayMessages($currentAttacker);
            $this->displayMessages($currentDefender);

            // Swap attacker and defender
            [$currentAttacker, $currentDefender] = [$currentDefender, $currentAttacker];
        }

        $winner = $unit1->getHp() > 0 ? $unit1 : $unit2;
        echo "<p>¡{$winner->getName()} ha ganado el combate!</p>";
    }

    private function displayMessages(Unit $unit): void {
        foreach ($unit->getMessages() as $message) {
            echo "<p>{$message}</p>";
        }
    }
}
