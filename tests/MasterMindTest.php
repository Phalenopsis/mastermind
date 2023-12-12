<?php

use PHPUnit\Framework\TestCase; // classe abstraite dont hérite notre classe de test
use App\MasterMind; // classe testée
use PHPUnit\Framework\Attributes\DataProvider; // permet d'utiliser l'attribut DataProvider

class MasterMindTest extends TestCase
{
    /**
     * Data provider => retourne les valeurs passées en arguments à la fonction de test
     *
     * @return array
     */
    public static function getScoreProvider(): array
    {
        $masterColors = ['blue', 'green', 'white', 'black'];
        return [
            [$masterColors, ['purple', 'orange', 'pink', 'yellow'], [0, 0]],
            [$masterColors, ['red', 'blue', 'green', 'pink'], [2, 0]],
            [$masterColors, ['blue', 'orange', 'pink', 'yellow'], [0, 1]],
            [$masterColors, ['purple', 'orange', 'pink', 'yellow'], [0, 0]],
            [$masterColors, ['red', 'blue', 'green', 'black'], [2, 1]],
            [$masterColors, ['blue', 'green', 'white', 'black'], 'win'],
        ];
    }

    /**
     * fonction de test pour tester Mastermind->getScore() 
     * 
     * @param array $master -> les couleurs du master
     * @param array $player -> les couleurs du player
     * @param array|string $expected -> le résultat attentu de la méthode avec ces deux entrées.
     * @return void
     */
    #[DataProvider('getScoreProvider')] // indique à la fonction de test qui va lui fournir les valeurs
    public function testGetScore($master, $player, $expected)
    {
        $solution = new MasterMind();

        $this->assertSame($expected, $solution->getScore($master, $player)); //on vérifie que $expected === le résultat de la méthode testée

        // Ce que l'on aurait du faire sans le provider

        // $master = ['blue', 'green', 'green', 'black'];
        // $player = ['red', 'blue', 'green', 'pink'];
        // $this->assertSame([0, 1], $solution->getScore($master, $player));

        // $master = ['blue', 'green', 'white', 'black'];
        // $player = ['red', 'blue', 'green', 'pink'];
        // $this->assertSame([2, 0], $solution->getScore($master, $player));

        // $master = ['blue', 'green', 'white', 'black'];
        // $player = ['blue', 'orange', 'pink', 'yellow'];
        // $this->assertSame([2, 0], $solution->getScore($master, $player));
    }
}
