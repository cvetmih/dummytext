<?php
require_once 'settings.php';

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,600i,700,700i&amp;subset=latin-ext" rel="stylesheet">

<style media="screen">
    body{
        font-family: 'Raleway', sans-serif;
        background:#fff;
    }
    h1{
        color:#E7807B;
    }
    h2{
        margin-top:0;
        text-align:center;
        color:#E3A79F;
    }
    label{
        color:#888;
    }
    .container{
        max-width:600px;
    }
    #libList{
        position:absolute;
        top:0;
        left:10px;
        background:#000;
        color:#fff;
        padding:25px;
        padding-top:10px;
        border-radius: 0 0 10px 10px;
        font-size:12px;
        height:45px;
        overflow: hidden;
        transition: all 1s;
        z-index:999;
    }
    #libList:hover{
        height:200px;
        overflow:auto;
    }
    #libList h3{
        font-size:16px;
        padding:0;
        margin:0;
        padding-bottom:10px;
        margin-bottom:10px;
        text-align:center;
        text-transform: uppercase;
        border-bottom:2px solid rgba(255,255,255,.4);
    }
    #libList ul{
        padding:0;
        margin:0;
        list-style-type: none;
        text-indent: 0;
    }
    #libList ul li{
        padding:0;
        margin:0;
        text-indent: 0;
        display: block;
    }

    #navigation  {
        padding:0;
        margin:-15px 0;
        list-style-type: none;
        display:block;
        /*background:rgba(0,0,0,.3)*/
    }
    #navigation li{
        display:inline-block;
        margin:0 10px;
    }
    #navigation li a{
        padding:5px 10px;
        display:block;
        /*background:rgba(0,0,0,.3);*/
        color:#777;
    }

    .inline-input{
        width:49.5%;
        float:left;
    }
    .inline-input:nth-of-type(even){
        margin-right:0.5%;
    }
    .inline-input:nth-of-type(odd){
        margin-left:0.5%;
    }
    .btn-default{
        margin:0 auto;
        display: block;
    }

    #generatedText{
        line-height:2;
    }
</style>


<div class="hidden-xs hidden-sm" id="libList">
    <h3>List of libraries</h3>
    <?php listLibraries('ul'); ?>
</div>

<div class="container">

    <div class="row">
        <div class="col-xs-12 text-center">
            <h1>Dummy Text Generator</h1>
            <hr />
            <ul id="navigation">
                <li><a href="index.php">Generate text</a></li>
                <li><a href="index.php?action=newlibrary">Create a library</a></li>
            </ul>
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">





<?php


        if($_GET['action'] == 'newlibrary'){


            if(!isset($_GET['newlibrarytext'])){

                ?>
                <h2>Create a new library</h2>
                <form action="" method="get">
                <input type="hidden" name="action" value="newlibrary" />
                  <div class="form-group">
                    <label for="email">Library name:</label>
                    <input type="text" name="newlibraryname" value="" placeholder="Library name" class="form-control" id="newLibraryName">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Library language:</label>
                    <input type="text" name="newlibrarylang" value="" placeholder="Library language" class="form-control" id="newLibraryLang">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Paste your text:</label>
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
                <label for="pwd">Length:</label>
                <input type="number" name="length" value="<?php $length = (!empty($_GET['length'])) ? $_GET['length'] : '100'; echo $length; ?>"  class="form-control" id="generateLength">
              </div>
              <div class="form-group inline-input">
                <label for="pwd">Length type:</label>
                <select name="lengthtype" class="form-control" id="generateLengthType">
                    <option value="words" selected>Words</option>
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
