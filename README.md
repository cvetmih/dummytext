# Dummy Text Generator

This is my own version of dummy text generator, hopefully it will make some use.

## Version Log

* *v0.02*

    * Added some styles
    * Improved 'humanizing' of generated text

* *v0.01*

    * Basic usability, basic design
    * 'Add a library' feature - creates `TXT` files of scanned text
    * None security
    * Only posible to input number of words (no letters, no paragraphs)

## Planned features

* Multiple languages
* Length type - letters, paragraphs
* Formatting - paragraphs, html
* HTML formatting - add random html tags
* Lots of other fun stuff

## Needed files

### Index (_index.php_)

Here you will be able to choose which type of dummy text you want (not only *Lorem ipsum*).

It will use GET method to obtain the input parameters. `?lang=en&lengthtype=words&length=20&format=html`

### Library (_library.php_)

Here you will be able to create, edit and remove dictionaries used by the generator.

* #### newLibrary(_name_, _language_) function
    * Parse text, take each word in lowercase and add it to array.
    * Look for bad words, nonsense and duplicates.
    * Create new `.txt` file with the new library.

* #### loadLibrary(_name_, _language_) function
    * Tries to load library, if it exists it will return the library as an `array`, if not it will return `false`

### Alchymist (_alchymist.php_)

*Alchymist* creates dummy text from the loaded library.
