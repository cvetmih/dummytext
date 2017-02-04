<?php

function createText($library, $lengthtype, $length){


    $text = '';
    $chance = 0;

    for ($i = 0; $i < $length; $i++){


        $toAdd = trim($library[array_rand($library)]);

        if($chance > PUNC_CHANCE){
            $rand = rand(1,100);
            if($rand <= PUNC_PROB){
                $whatChar = rand(1,100);
                if($whatChar <= 50){
                    $toAdd .= PUNC_50;
                }
                elseif($whatChar > 50 && $whatChar <= 70){
                    $toAdd .= PUNC_20;
                }
                elseif($whatChar > 70 && $whatChar <= 80){
                    $toAdd .= PUNC_10;
                }
                elseif($whatChar > 80 && $whatChar <= 90){
                    $toAdd .= PUNC_10_2;
                }
                elseif($whatChar > 90 && $whatChar <= 95){
                    $toAdd .= PUNC_5;
                }
                elseif($whatChar > 95){
                    $toAdd .= PUNC_2;
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
