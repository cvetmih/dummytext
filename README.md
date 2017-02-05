# Dummy Text Generator

This is my own version of dummy text generator, hopefully it will make some use.

## Version Log

* **v0.05**

    * Added character limit to new library textarea
    * Included local chopped Bootstrap CSS
    * Included jQuery just for the eyecandy purpose
    * Started using uglified (S)CSS and JS

* **v0.04**

    * Added paragraph and character length type
    * Improved styling

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
* Switch from `GET` to `POST`
* ~~Length type - letters, paragraphs~~
* Formatting - paragraphs, html
* HTML formatting - add random html tags
* Improve text humanizing
* Secure code
* Lots of other fun stuff

## Needed files

#### Index (_index.php_)

Here you will be able to choose which type of dummy text you want (not only *Lorem ipsum*).

It will use GET method to obtain the input parameters. `?lengthtype=words&length=20&format=html`

##### Available GET parameters

| Key    | Parameter  | Children          | Usage                                                                                                |
| :----: | :--------: |:-----------------:| :--------------------------------------------------------------------------------------------------- |
| action | newtext    |                   | When new text is generated                                                                           |
|        |            | library           | What library should be used for the generated text                                                   |
|        |            | length            | Length of the generated text                                                                         |
|        |            | lengthtype        | Length measurement (words, letters, characters)                                                      |
| action | newlibrary |                   | When new library is being created                                                                    |
|        |            | newlibrarytext    | Text to be parsed as library                                                                         |
|        |            | newlibraryname    | Name of the new library                                                                              |
|        |            | newlibrarylang    | Language of the new library                                                                          |
| manual | add        |                   | Adds string defined in `index.php` as a library instead of textarea input (use when too big for GET) |

---

#### Library (_library.php_)

Here you will be able to create, edit and remove dictionaries used by the generator.

##### loadLibrary(_Name_, _Language_) function

1. **Name:** Name of the text file which contains the library
2. **Language:** Language of the wanted library (maybe will be depreciated)

* Tries to load library, if it exists it will return the library as an `array`, if not it will return `false`

##### newLibrary(_Name_, _Language_) function

* Parse text, take each word in lowercase and add it to array.
* Look for bad words, nonsense and duplicates.
* Create new `.txt` file with the new library.

##### listLibraries(_Type_) function

1. **Type:** How to list libraries (currently `ol` or `select` - ordered list or select type input)

* Lists all available libraries in wanted way

---

#### Alchymist (_alchymist.php_)

**Alchymist** creates dummy text from the loaded library.

##### createText(_Library_, _LengthType_, _Length_) function

1. **Library:** Library to choose words from
2. **LengthType:** Whether it's words, letters or characters
3. **Length:** Whether it's words, letters or characters

* Creates text, then uses `humanize` function to make it look more realistic.

---

#### Helper files (_helpers.php_)

Here you will find all the helping functions needed for DTG to work.
