<?php

namespace IsoCodes;

class OrganismeType12NormeB2 implements IsoCodeInterface
{

    /**
     * validate Clef type 1-2 Norme B2 Securité Sociale
     * n° établissement, centre de santé, praticien, laboratoire, pharmacien, trasnporteur, fournisseur,
     * n° accident du travail, n° d'organisme complémentaire.
     *
     * @param string $code
     * @param mixed $clef
     *
     * @return bool
     */
    public static function validate($code = '', $clef=-1)
    {
        if (strlen($ean13) < 2) return false;
        if (!is_string($code)) return false;
        if (!is_numeric($clef)) return false;

        $chiffres = str_split($code);
        $rang = array_reverse(array_keys($chiffres));
        $chiffresOrdonnes = array();
        foreach($rang as $i=>$valeurRang){
                $chiffresOrdonnes[$valeurRang+1] = $chiffres[$i];
        }
        $resultats = array();
        foreach($chiffresOrdonnes as $cle => $valeur) {
                $resultats[$valeur] = ($cle % 2 == 0) ? ($valeur * 1) : ($valeur *2);
        }
        $addition = 0;
        foreach($resultats as $cle => $valeur) {
                $addition += array_sum(str_split($valeur));
        }
        $clefValide = str_split($addition);
        $clefValide = 10 - array_pop($clefValide);

        return ($clef === $clefValide);

    }
}
