<?php

function createText($library, $lengthtype, $length){




    function dumpText($length, $library){
        $text = '';
        $chance = 0;

        for ($i = 0; $i < $length; $i++){


            $toAdd = trim($library[array_rand($library)]);

            if($i == 0){
                $toAdd == ucfirst($toAdd);
            }

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
                        $toAdd .= PUNC_5_2;
                    }


                }

                $chance = 0;
            }
            else{
                $chance++;
            }


            $text .= $toAdd  . ' ';

        }

        return $text;
    }

    if($lengthtype == 'words'){

    $text = dumpText($length, $library);

    $text = '<p>' . humanize(trim($text), $lengthtype) .'</p>';

    }

    elseif($lengthtype == 'paragraphs'){

        $text = '';

        for($i = 0; $i<$length; $i++){
            $paragraph_length = rand(PARAGRAPH_MIN, PARAGRAPH_MAX);
            $text .= dumpText($paragraph_length, $library) . '|||';
        }



        $text = humanize(trim($text), $lengthtype);

    }

    elseif($lengthtype == 'characters'){

        $text = '';

        for($usedChars=0; $usedChars < $length; $usedChars = $usedChars + strlen($text) - 3){

            $paragraph_length = rand(PARAGRAPH_MIN, PARAGRAPH_MAX);
            $text .= dumpText($paragraph_length, $library) . '|||';

        }

        $text = substr($text, 0, $length);

        $substitute = 0;

        for($i=0; $i<3; $i++){

            if (substr($text, -1) == ' '){
                $text = rtrim($text, " ");
                $substitute++;
            }
            if (substr($text, -1) == '|'){
                $text = rtrim($text, "|");
                $substitute++;
            }
            if (substr($text, -1) == ','){
                $text = rtrim($text, ",");
                $substitute++;
            }
            if (substr($text, -1) == '-'){
                $text = rtrim($text, "-");
                $substitute++;
            }
            if (substr($text, -1) == ';'){
                $text = rtrim($text, ";");
                $substitute++;
            }

        }

        if($substitute>0){
            for($i = 0; $i<$substitute; $i++){
                if($i == $substitute-1){
                    $text .= '.';
                }
                else{
                    $possible = array('e', 'r', 'a', 'd');
                    $text .= $possible[array_rand($possible)];
                }
            }
        }

        str_replace("|||", "ale", $text);

        $text = '<p>' . humanize(trim($text), $lengthtype) .'</p>';




    }
    return $text;


}


?>
