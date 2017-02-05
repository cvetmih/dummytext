<?php

function loadLibrary($name, $lang){


    // $name = slugify($name);

    $library = array();

    $handle = fopen('libs/' . $name, "r");

    if ($handle) {
        while (($line = fgets($handle)) !== false) {

            $library[] = $line;

        }

        fclose($handle);
    } else {
        die('Error while opening file.');
    }



    return $library;

}

function newLibrary($name, $lang, $text){

    if(!empty($name) && !empty($lang) && !empty($text)){


        $name = slugify(sanitize($name));
        $lang = slugify(sanitize($lang));
        $text = sanitize($text);

        // REMOVE UNWANTED CHARACTERS FROM TEXT

        $text = cleanText($text);
        $boomtext = explode(' ', $text);

        // Remove duplicates from array
        $boomtext = array_unique($boomtext);




        function createFile($name, $lang){

        $file = 'libs/' . $lang . '.' . $name . '.txt';

        if (file_exists($file)) {
            $file = 'libs/' . $lang . '.' . $name . '_' . rand(1, 99999) . '.txt';
            return $file;
            // echo 'existuje';

        } else {
            return $file;
            // echo 'neexistuje';
        }


        // die();
        }


        $file = createFile($name, $lang);

        foreach ($boomtext as $word) {

            $word = $word."\n";

            file_put_contents($file, $word, FILE_APPEND | LOCK_EX);

        }


    }

    else{

        die('All inputs are required.');


    }

}


function listLibraries($type){

    DEFINE ('LIBS', './libs/'); //Define the directory path
    $directory = new DirectoryIterator(LIBS); //Get all the contents in the directory


    if($type == 'ul'){
    echo '<ul>';
    }
    elseif ($type == 'select') {
        echo '<select name="library" class="form-control" id="generateLibrary">';
    }

    foreach ($directory as $files) { //Check that the contents of the directory are each files  and then do what you want with them after you have the name of the file.
        if ($files->isFile()) {

            $bad = 0;
            foreach(BAD_FILES as $badfile){
                if($files->getFilename() == $badfile){
                    $bad = 1;
                }
            }


            if($bad == 0){

                    $file_name_initial = $files->getFilename();
                    // $my_page = file_get_contents(LIBS. $file_name); //Collect the content of the file.
                    $file_name = explode('.txt', $file_name_initial);

                    $file_name = explode('.', $file_name[0]);

                    $lang = ' ('. strtoupper($file_name[0]) . ')';

                    if($lang == ' (CZ)'){
                        $lang_img = '<img src="img/flags/cz.png" class="icon-flag" alt="Čeština" />';
                    }
                    elseif($lang == ' (EN)'){
                        $lang_img = '<img src="img/flags/en.png" class="icon-flag" alt="English" />';

                    }
                    else{
                        $lang_img = '';
                    }

                    $file_name = explode('_', $file_name[1]);

                    $file_name = str_replace("-", " ", $file_name[0]);

                    $file_name = ucwords($file_name);

                    if($type == 'ul'){
                        echo '<li><a href="libs/' . $file_name_initial . '" title="Open TXT file with this library">' . $lang_img . $file_name .'</a></li>';
                    }
                    elseif ($type == 'select') {
                        echo '<option value="' . $file_name_initial . '" ';
                        if ($file_name_initial == $_GET['library']) echo ' selected ';
                        echo '>' . $file_name . $lang . '</option>';
                    }
            }


        } else {
        //Insert nothing into the $my_privacy_policy variable.
        }
        // echo $my_page; // Do what you want with the contents of the file.
    }

    if($type == 'ul'){
    echo '</ul>';
    }
    elseif ($type == 'select') {
        echo '</select>';
    }


}



?>
