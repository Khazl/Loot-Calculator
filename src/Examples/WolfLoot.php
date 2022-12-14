<?php

namespace Khazl\LootCalculator\Examples;

use Khazl\LootCalculator\Contracts\LootCalculatorInterface;
use Khazl\LootCalculator\LootCalculator;

class WolfLoot
{
    private LootCalculatorInterface $lootPool;

    public function __construct()
    {
        $this->lootPool = new LootCalculator([
            'CharacterItem:462' => 200, // Leather
            'CharacterItem:9875' => 300, // Claw
            'AccountItem:64' => 1, // Very rare pet
        ]);
    }

    public function loot(): array
    {
        $loot = [];

        // draft three times
        for ($i = 0; $i < 3; $i++) {
            $loot[] = $this->lootPool->draw();
        }
        return $loot; // ['CharacterItem:462', 'CharacterItem:9875', 'AccountItem:64']
    }
}
