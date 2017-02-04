<?php
require_once 'settings.php';

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,600i,700,700i&amp;subset=latin-ext" rel="stylesheet">

<style media="screen">
    body{
        font-family: 'Raleway', sans-serif;
        background:#fff;
        -webkit-box-sizing:border-box;
         -moz-box-sizing:border-box;
         -ms-box-sizing:border-box;
         box-sizing:border-box;
         border-top:10px solid #777;
         padding:50px 20px;
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
        cursor:pointer;
    }
    .container{
        max-width:600px;

        -webkit-animation: fadein .3s linear; /* Safari, Chrome and Opera > 12.1 */
      -moz-animation: fadein .3s linear; /* Firefox < 16 */
       -ms-animation: fadein .3s linear; /* Internet Explorer */
        -o-animation: fadein .3s linear; /* Opera < 12.1 */
           animation: fadein .3s linear;
    }
    #libList{
        position:absolute;
        top:0;
        left:10px;
        background:#777;
        color:#fff;
        padding-bottom:25px;
        padding-top:10px;
        border-radius: 0 0 3px 3px;
        font-size:12px;
        height:38px;
        overflow: hidden;
        transition: all .6s;
        z-index:999;


        -webkit-box-shadow: 0px 3px 20px 0px rgba(0,0,0,0.2);
           -moz-box-shadow: 0px 3px 20px 0px rgba(0,0,0,0.2);
                box-shadow: 0px 3px 20px 0px rgba(0,0,0,0.2);
    }
    #libList:hover{
        height:200px;
        overflow:auto;
        color:#E7807B;

        -webkit-box-shadow: 0px 5px 30px 0px rgba(0,0,0,0.4);
           -moz-box-shadow: 0px 5px 30px 0px rgba(0,0,0,0.4);
                box-shadow: 0px 5px 30px 0px rgba(0,0,0,0.4);
    }
    #libList h3{
        font-size:16px;
        padding:0;
        margin:2px 0 10px;
        /*padding-bottom:10px;*/
        text-align:center;
        text-transform: uppercase;
        cursor: default;
        /*border-bottom:2px solid rgba(255,255,255,.4);*/
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
    #libList ul li a{
        color:rgba(255,255,255,.7);
        transition:color .1s linear, opacity .6s linear;
        opacity:0;
        display: block;
        padding:5px 25px;
    }

    #libList ul li a:hover{
        color:rgba(255,255,255,1);
        text-decoration: none;
        background:#E7807B;
    }

    #libList:hover ul li a{
        opacity:1;
        transition:color .1s linear, opacity .3s linear;
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
        margin:0;
    }
    #navigation li a{
        padding:5px 10px 2px 10px;
        display:block;
        background:transparent;
        color:#777;
        border-radius:2px;
        border-bottom:3px solid transparent;
        transition: background .15s linear, color .15s linear, border-color .15s linear;
    }
    #navigation li a:hover, #navigation li a.active{
        background:#E3A79F;
        color:#fff;
        text-decoration: none;
        border-color:rgba(0,0,0,.1);
        transition: background .1s linear, color .1s linear, border-color .1s linear;
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

    input, select, textarea{
        border:1px solid #ddd !important;
        border-bottom:2px solid #ddd !important;
        padding-left:10px;
        transition: border-color .3s linear, padding-left .3s linear !important;
    }

    input:focus, select:focus, textarea:focus{
        border-color:#E3A79F !important;
        outline:none;
        box-shadow:none !important;
        padding-left:20px;
    }

    #generatedText{
        line-height:2;
        border:2px dashed #ccc;
        padding: 20px;
        text-align: justify;
    }


    @keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}
</style>


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
