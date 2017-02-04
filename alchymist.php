<?php

function createText($library, $lengthtype, $length){


    $text = '';
    $chance = 0;

    for ($i = 0; $i < $length; $i++){


        $toAdd = trim($library[array_rand($library)]);

        if($chance > 3){
            $rand = rand(1,10);
            if($rand <= 5){
                $whatChar = rand(1,100);
                if($whatChar <= 50){
                    $toAdd .= '.';
                }
                elseif($whatChar > 50 && $whatChar <= 70){
                    $toAdd .= ',';
                }
                elseif($whatChar > 70 && $whatChar <= 80){
                    $toAdd .= '?';
                }
                elseif($whatChar > 80 && $whatChar <= 90){
                    $toAdd .= '!';
                }
                elseif($whatChar > 90 && $whatChar <= 95){
                    $toAdd .= ';';
                }
                elseif($whatChar > 95){
                    $toAdd .= ' -';
                }


            }

            $chance = 0;
        }
        else{
            $chance++;
        }


        $text .= $toAdd  . ' ';

    }


    $text = humanize(trim($text));
    return $text;


}


?>
