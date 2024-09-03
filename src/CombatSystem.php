<?php

namespace StudyCsr;

class CombatSystem {
    public function battle(Unit $unit1, Unit $unit2): void {
        $round = 1;
        while ($unit1->getHp() > 0 && $unit2->getHp() > 0) {
            echo "<h3>Ronda {$round}</h3>";

            $unit1->attack($unit2);
            $this->displayMessages($unit1);
            $this->displayMessages($unit2);

            if ($unit2->getHp() > 0) {
                $unit2->attack($unit1);
                $this->displayMessages($unit2);
                $this->displayMessages($unit1);
            }

            echo "<p>{$unit1->getName()}: {$unit1->getHp()} HP | {$unit2->getName()}: {$unit2->getHp()} HP</p>";
            echo "<hr>";

            $round++;
        }

        $winner = $unit1->getHp() > 0 ? $unit1 : $unit2;
        echo "<h2>{$winner->getName()} gana la batalla!</h2>";
    }

    private function displayMessages(Unit $unit): void {
        foreach ($unit->getMessages() as $message) {
            echo "<p>{$message}</p>";
        }
    }
}
