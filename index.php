<?php
require_once 'settings.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dummy Text Generator</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="build/css/bootstrap.min.css">
        <link rel="stylesheet" href="build/css/main.min.css">
    </head>
    <body class="no-js">

        <aside class="" id="libList">
            <h3>List of libraries</h3>
            <?php listLibraries('ul'); ?>
        </aside>

<main class="container">

    <header class="row">
        <div class="col-xs-12 text-center">
            <h1>Dummy Text Generator</h1>
            <nav>

                <ul id="navigation">
                    <li><a href="index.php" title="Generate dummy text" <?php $active = ($_GET['action'] !==  'newlibrary') ? 'class="active"' : ''; echo $active; ?>>Generate text</a></li>
                    <li><a href="index.php?action=newlibrary" title="Create a new library" <?php $active = ($_GET['action'] ==  'newlibrary') ? 'class="active"' : ''; echo $active; ?>>Create a library</a></li>
                </ul>

            </nav>
        </div>
    </header>
    <section class="row">
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
                <header><h2>Create a new library</h2></header>
                <form action="./" method="get" id="newLibraryForm">
                <input type="hidden" name="action" value="newlibrary" />
                  <div class="form-group slideLabel">
                    <label for="newLibraryName">Library name</label>
                    <input type="text" name="newlibraryname" value="" class="form-control" id="newLibraryName" maxlength="30" required="required" />
                  </div>
                  <div class="form-group slideLabel">
                    <label for="newLibraryLang">Library language</label>
                    <input type="text" name="newlibrarylang" value="" class="form-control" id="newLibraryLang" maxlength="2" required="required" />
                  </div>
                  <div class="form-group slideLabel">
                    <label for="newLibraryText">Paste your text</label>
                    <textarea name="newlibrarytext" rows="8" class="form-control" id="newLibraryText" maxlength="1900" onkeyup="countChar(this)" required="required"></textarea>
                    <div id="charNum"></div>
                  </div>
                  <div class="clearfix">

                  </div>
                  <button type="submit" class="btn btn-default">Fill all inputs</button>
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
            <header><h2>Generate text</h2></header>

            <form action="./" method="get" id="newTextForm">
            <input type="hidden" name="action" value="newtext" />
              <div class="form-group">
                <label for="generateLibrary">Library name</label>
                <?php listLibraries('select'); ?>
              </div>
              <div class="form-group inline-input">
                <label for="generateLength">Length</label>
                <input type="number" name="length" value="<?php $length = (!empty($_GET['length'])) ? $_GET['length'] : '100'; echo $length; ?>"  class="form-control" id="generateLength" required="required">
              </div>
              <div class="form-group inline-input">
                <label for="generateLengthType">Length type</label>
                <select name="lengthtype" class="form-control" id="generateLengthType">
                    <option value="words" <?php if($_GET['lengthtype'] == 'words') echo 'selected'; ?>>Words</option>
                    <option value="paragraphs" <?php if($_GET['lengthtype' ]== 'paragraphs') echo 'selected'; ?>>Paragraphs</option>
                    <option value="characters" <?php if($_GET['lengthtype'] == 'characters') echo 'selected'; ?>>Characters</option>
                </select>
              </div>
              <button type="submit" class="btn btn-default">Do the magic!</button>
            </form>

            <?php
        }

        if($_GET['action'] == 'newtext' && !empty($_GET['length'])){

            $lib = sanitize($_GET['library']);
            $length = sanitize($_GET['length']);
            $lengthtype = sanitize($_GET['lengthtype']);

            $library = loadLibrary($lib, 'en');
            $text = createText($library, $lengthtype, $length);
            echo '<a href="javascript:void(0);" class="selectall">Select all!</a>';
            echo '<div id="generatedText">';
                echo $text;
            echo '</div>';
        }
?>

                </div>
            </section>
        </main>

        <script type="text/javascript">
            function SelectText(element) {
                var doc = document
                    , text = doc.getElementById(element)
                    , range, selection
                ;
                if (doc.body.createTextRange) {
                    range = document.body.createTextRange();
                    range.moveToElementText(text);
                    range.select();
                } else if (window.getSelection) {
                    selection = window.getSelection();
                    range = document.createRange();
                    range.selectNodeContents(text);
                    selection.removeAllRanges();
                    selection.addRange(range);
                }
                }

                document.onclick = function(e) {
                if (e.target.className === 'selectall') {
                    SelectText('generatedText');
                }
            };
        </script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="build/js/main.min.js"></script>

    </body>
</html>
