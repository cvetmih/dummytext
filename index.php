<?php
require_once 'settings.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,600i,700,700i&amp;subset=latin-ext" rel="stylesheet">

<link rel="stylesheet" href="css/main.css">


<div class="" id="libList">
    <h3>List of libraries</h3>
    <?php listLibraries('ul'); ?>
</div>

<div class="container">

    <div class="row">
        <div class="col-xs-12 text-center">
            <h1>Dummy Text Generator</h1>
            <hr />
            <ul id="navigation">
                <li><a href="index.php" title="Generate dummy text" <?php $active = ($_GET['action'] !==  'newlibrary') ? 'class="active"' : ''; echo $active; ?>>Generate text</a></li>
                <li><a href="index.php?action=newlibrary" title="Create a new library" <?php $active = ($_GET['action'] ==  'newlibrary') ? 'class="active"' : ''; echo $active; ?>>Create a library</a></li>
            </ul>
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">





<?php


        if($_GET['manual'] == 'add'){

            $name = 'New Library';
            $lang = 'en';
            $text = '';

            if(!empty($text) && !empty($name) && !empty($lang)){
                $newlibrary = newLibrary($name, $lang, $text);
            }
        }

        if($_GET['action'] == 'newlibrary'){


            if(!isset($_GET['newlibrarytext'])){

                ?>
                <h2>Create a new library</h2>
                <form action="" method="get">
                <input type="hidden" name="action" value="newlibrary" />
                  <div class="form-group">
                    <label for="newLibraryName">Library name:</label>
                    <input type="text" name="newlibraryname" value="" placeholder="Library name" class="form-control" id="newLibraryName">
                  </div>
                  <div class="form-group">
                    <label for="newLibraryLang">Library language:</label>
                    <input type="text" name="newlibrarylang" value="" placeholder="Library language" class="form-control" id="newLibraryLang">
                  </div>
                  <div class="form-group">
                    <label for="newLibraryText">Paste your text:</label>
                    <textarea name="newlibrarytext" rows="8" cols="80" placeholder="Paste your text here" class="form-control" id="newLibraryText"></textarea>
                  </div>
                  <button type="submit" class="btn btn-default">Create library</button>
                </form>


                <?php
            }

            else{

                // PROCESS THE LIBRARY

                $newlibrary = newLibrary($_GET['newlibraryname'], $_GET['newlibrarylang'], $_GET['newlibrarytext']);
                echo $newlibrary;


            }


        }

        else{
            ?>
            <h2>Generate text</h2>

            <form action="" method="get">
            <input type="hidden" name="action" value="newtext" />
              <div class="form-group">
                <label for="generateLibrary">Library name:</label>
                <?php listLibraries('select'); ?>
              </div>
              <div class="form-group inline-input">
                <label for="generateLength">Length:</label>
                <input type="number" name="length" value="<?php $length = (!empty($_GET['length'])) ? $_GET['length'] : '100'; echo $length; ?>"  class="form-control" id="generateLength">
              </div>
              <div class="form-group inline-input">
                <label for="generateLengthType">Length type:</label>
                <select name="lengthtype" class="form-control" id="generateLengthType">
                    <option value="words" <?php if($_GET['lengthtype'] == 'words') echo 'selected'; ?>>Words</option>
                    <option value="paragraphs" <?php if($_GET['lengthtype' ]== 'paragraphs') echo 'selected'; ?>>Paragraphs</option>
                    <option value="characters" <?php if($_GET['lengthtype'] == 'characters') echo 'selected'; ?>>Characters</option>
                </select>
              </div>
              <button type="submit" class="btn btn-default">Generate text</button>
            </form>

            <?php
        }

        if($_GET['action'] == 'newtext' && !empty($_GET['length'])){

            $lib = sanitize($_GET['library']);
            $length = sanitize($_GET['length']);
            $lengthtype = sanitize($_GET['lengthtype']);

            $library = loadLibrary($lib, 'en');
            $text = createText($library, $lengthtype, $length);
            echo '<div id="generatedText">';
                echo $text;
            echo '</div>';
        }
?>

</div>
</div>
</div>
