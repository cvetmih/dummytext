# Dummy Text Generator

This is my own version of dummy text generator, hopefully it will make some use.

## Version Log

* **v0.03**

    * Added defining constants to `settings.php`
    * Added defining bad files which are not supposed to be listed as libraries
    * Added Harry Potter libraries (czech and english version)

* **v0.02**

    * Added some styles
    * Improved 'humanizing' of generated text

* **v0.01**

    * Basic usability, basic design
    * 'Add a library' feature - creates `TXT` files of scanned text
    * None security
    * Only posible to input number of words (no letters, no paragraphs)

## Requirements

* PHP 7.0 and higher

## Planned features

* Multiple languages
* Length type - letters, paragraphs
* Formatting - paragraphs, html
* HTML formatting - add random html tags
* Lots of other fun stuff

## Needed files

### Index (_index.php_)

* #### Available GET parameters
    * Yet to be listed

Here you will be able to choose which type of dummy text you want (not only *Lorem ipsum*).

It will use GET method to obtain the input parameters. `?lang=en&lengthtype=words&length=20&format=html`



### Library (_library.php_)

Here you will be able to create, edit and remove dictionaries used by the generator.

* #### loadLibrary(_Name_, _Language_) function
    1. _Name:_ Name of the text file which contains the library
    2. _Language_: Language of the wanted library (maybe will be depreciated)

    * Tries to load library, if it exists it will return the library as an `array`, if not it will return `false`

* #### newLibrary(_Name_, _Language_) function
    * Parse text, take each word in lowercase and add it to array.
    * Look for bad words, nonsense and duplicates.
    * Create new `.txt` file with the new library.

* #### listLibraries(_Type_) function
    1. _Type:_ How to list libraries (currently `ol` or `select` - ordered list or select type input)

    * Lists all available libraries in wanted way




### Alchymist (_alchymist.php_)

**Alchymist** creates dummy text from the loaded library.

* #### createText(_Library_, _LengthType_, _Length_) function
    1. _Library:_ Library to choose words from
    2. _LengthType:_ Whether it's words, letters or characters
    3. _Length:_ Whether it's words, letters or characters

    * Creates text, then uses `humanize` function to make it look more realistic.


### Helper files (_helpers.php_)

Here you will find all the helping functions needed for DTG to work.
