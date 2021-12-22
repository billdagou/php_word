# TYPO3 Extension: PHPWord

EXT:php_word provides a ViewHelper to generate the Word file with [PHPWord](https://github.com/PHPOffice/PHPWord) library.

**The extension version only matches the PHPWord library version, it doesn't mean anything else.**

## How to use it

First of all, you need to install [PHPWord](https://github.com/PHPOffice/PHPWord) via [Composer](https://getcomposer.org/) under `EXT:php_word/Resources/Private/PHPWord/`.

    cd typo3conf/ext/php_word/Resources/Private/PHPWord/
    composer install --no-dev --prefer-dist

After that, you can use the viewhelper to generate the Word file and download it.

    <df:http.download>
        <phpword:http.download.word>...</phpword:http.download.word>
    </df:http.download>

#### Attributes

- `phpWord` ([PhpWord](https://github.com/PHPOffice/PHPWord/blob/develop/src/PhpWord/PhpWord.php)) PhpWord instance.
- `writer` (string) Writer name, `Word2007`, `ODText`, `RTF`, `HTML`, `PDF`. Default `Word2007`.