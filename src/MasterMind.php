<?php

namespace App;

class MasterMind
{
    /**
     * Fonction pour calculer le score au Mastermind
     * Coucou Virginie
     *
     * @param array $masterColors -> les couleurs à chercher
     * @param array $playerColors -> les couleurs proposées
     * @return array|string
     */
    public function getScore(array $masterColors, array $playerColors): array|string
    {
        $goodPlaced = 0;
        $badPlaced = 0;

        // for ($i = 0; $i < count($masterColors); $i++) {
        //     if (in_array($playerColors[$i], $masterColors)) {
        //         if ($i === array_search($playerColors[$i], $masterColors)) {
        //             $goodPlaced += 1;
        //         } else {
        //             $badPlaced += 1;
        //         }
        //     }
        // }
        foreach ($playerColors as $key => $color) {
            if (in_array($color, $masterColors)) {
                if ($key === array_search($color, $masterColors)) {
                    $goodPlaced += 1;
                } else {
                    $badPlaced += 1;
                }
            }
        }


        if ($goodPlaced === 4) {
            return 'win';
        }
        return [$badPlaced, $goodPlaced];
    }
}
