<?php

function sanitize($string){

    $string = strip_tags($string);
    $string = filter_var($string, FILTER_SANITIZE_STRING);
    return $string;

}

function cleanText($text){


    // $bad = array(".", ",", "!");
    // $good   = array("", "", "");
    //
    // $text = str_replace($bad, $good, $text);



    // Remove everything except letters and spaces
    // $text = preg_replace( "/\r|\n/", "", $text );



    $text = preg_replace("/[^a-zA-ZěščřžýáíéúůňńćďťĚŠČŘŽÝÁÍÉÚŮŇŃĎŤĆ ]/", " ", $text);


    // Replace multiple spaces with a single one
    $text = preg_replace('!\s+!', ' ', $text);

    // Switch to lowercase
    $text = strtolower($text);


    return $text;

}

function slugify($text){

    // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;


}

function humanizeParagraph($text){


    $boom = explode('.', $text);

    $newtext = '';

    $lastSentence = end($boom);



    foreach ($boom as $sentence) {
        if(!empty(trim($sentence))){

            if($sentence == $lastSentence){
                // echo '"' . ucfirst(trim($sentence)) . '"';
                $newtext .= ucfirst(trim($sentence));

            }
            else{
                // echo '"' . ucfirst(trim($sentence)) . '. "<br />';
                $newtext .= ucfirst(trim($sentence)). '. ';
            }

        }

    }

    $boom = explode('!', $newtext);

    $newtext2 = '';

    $lastSentence = end($boom);

    foreach ($boom as $sentence) {
        if(!empty(trim($sentence))){
            if($sentence == $lastSentence){
                // echo '"' . ucfirst(trim($sentence)) . '"';
                $newtext2 .= ucfirst(trim($sentence));
            }
            else{
                // echo '"' . ucfirst(trim($sentence)) . '! "<br />';
                $newtext2 .= ucfirst(trim($sentence)) . '! ';
            }
        }

    }

    $boom = explode('?', $newtext2);

    $newtext3 = '';

    $lastSentence = end($boom);

    foreach ($boom as $sentence) {
        if(!empty(trim($sentence))){

            if($sentence == $lastSentence){
                // echo '"' . ucfirst(trim($sentence)) . '"';
                $newtext3 .= ucfirst(trim($sentence));
            }
            else{
                // echo '"' . ucfirst(trim($sentence)) . '? "<br />';
                $newtext3 .= ucfirst(trim($sentence)). '? ';
            }
        }

    }


    $newtext = $newtext3;

    $newtext = rtrim($newtext, ",");
    $newtext = rtrim($newtext, ";");
    $newtext = rtrim($newtext, "-");
    $newtext = rtrim($newtext, "?");
    $newtext = rtrim($newtext, "!");
    $newtext = rtrim($newtext, ".");

    $newtext = ucfirst(trim($newtext));

    return $newtext . '.';

}

function humanize($text, $lengthtype){
    if($lengthtype == 'words' || $lengthtype == 'characters'){
        $text = humanizeParagraph($text);
    }
    elseif ($lengthtype == 'paragraphs') {
        $boom = explode('|||', $text);
        $text = '';
        foreach($boom as $paragraph){

            if(!empty($paragraph)){

            $text .= '<p>' . ucfirst(humanizeParagraph($paragraph) . '</p>');

            }

            // $text .= mb_convert_case($paragraph, MB_CASE_TITLE, "UTF-8");

        }

    }
    return $text;
}

?>
