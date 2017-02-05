<?php

// required files
require_once 'helpers.php';
require_once 'library.php';
require_once 'alchymist.php';

// global variables

// define files not tobe listed as libraries
define('BAD_FILES', array(
        '.DS_Store',
        'thumbs.db'
));

// each 3rd word will be challenged to get a punctuation mark appended
define('PUNC_CHANCE', 3); // default '3'

// perce tage that there will be a punctiation mark (1 - 100)
define('PUNC_PROB', 50); // default '5'

// 50% chance
define('PUNC_50', '.'); // default '.' (dot)

// 20% chance
define('PUNC_20', ','); // default ',' (comma)

// 10% chance
define('PUNC_10', '?'); // default '?' (question mark)

// 10% chance
define('PUNC_10_2', '!'); // default '!' (exclamation mark)

// 5% chance
define('PUNC_5', ';'); // default '';''

// 5% chance
define('PUNC_5_2', ' -'); // default ' -' (space dash)

// minimal length of a paragraph (in words)
define('PARAGRAPH_MIN', 40); // default '5'

// maximal length of a paragraph (in words)
define('PARAGRAPH_MAX', 100); // default '100'

?>
