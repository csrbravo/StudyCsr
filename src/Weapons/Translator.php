<?php

namespace StudyCsr\Weapons;

class Translator
{
    protected static $messages = [];

    public static function set(array $messages)
    {
        static::$messages = $messages;
    }

    public static function get($key, array $params = array())
    {
        if (! static::has($key)) {
            return "[$key]";
        }

        return static::replaceParams(static::$messages[$key], $params);
    }

    public static function has($key)
    {
        return isset (static::$messages[$key]);
    }

    public static function replaceParams($message, array $params)
    {
        foreach ($params as $key => $value)
        {
            $message = str_replace(":$key", $value, $message);
        }

        return $message;
    }

    public function move(string $direction): void {
        $this->addMessage(Translator::get('unit_moves', ['name' => $this->name, 'direction' => $direction]));
    }

    public function unitDie(): void {
        $this->addMessage(Translator::get('unit_dies', ['name' => $this->name]));
    }

    protected function dealDamage(Unit $opponent, int $damage): int {
        if ($this->weapon === null) {
            $this->addMessage(Translator::get('no_weapon', ['name' => $this->name]));
            return 0;
        }

        $damageDealt = $opponent->takeDamage($damage);
        $this->addMessage(Translator::get('unit_attacks', [
            'name' => $this->name,
            'weapon' => $this->weapon->getDescription(),
            'opponent' => $opponent->getName(),
            'damage' => $damageDealt
        ]));
        return $damageDealt;
    }

    public function takeDamage(int $damage): int {
        $originalDamage = $damage;
        if ($this->armor !== null) {
            $absorbedDamage = $this->armor->absorbDamage($damage);
            $damage -= $absorbedDamage;
            $this->addMessage(Translator::get('armor_absorbs', [
                'name' => $this->name,
                'absorbed' => $absorbedDamage
            ]));
        }
        $this->hp = max(0, $this->hp - $damage);
        $this->addMessage(Translator::get('unit_takes_damage', [
            'name' => $this->name,
            'damage' => $damage,
            'hp' => $this->hp
        ]));
        if ($this->hp <= 0) {
            $this->unitDie();
        }
        return $damage;
    }
}
