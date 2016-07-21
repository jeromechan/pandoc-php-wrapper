pandoc-php-wrapper
==========

Pandoc-php-wrapper is a native wrapper for the Pandoc commands.
Pandoc is a Haskell program that allows you to convert documents from one format to another.
For more information on Pandoc you can look [here](https://github.com/jgm/pandoc).

Installation
------------

You don't need to install it with composer or another packaging tools. Just clone it into your
project and invoke its public methods.

Customize
------------

Should I do any changes or extensions myself?
Absolutely you can!
Pandoc-php-wrapper have provided the common methods in `Converter.php`. Also you can write a
new `*Converter.php` for implementing the parent methods.

Sample code
------------

(1) Get converted contents as string

```
use pandoc_php_wrapper\core;

// Define parameters for testing
$markdownPath = __DIR__ . '/../assets/file_markdown.md';
$htmlConverter = new core\HtmlConverter();

// Do converting jobs
$result = $htmlConverter->convertAsStd(core\FormatInput::$FI_markdown, $markdownPath);

```

(2) Generate a file contains converted contents

```
use pandoc_php_wrapper\core;

// Define parameters for testing
$markdownPath = __DIR__ . '/../assets/file_markdown.md';
$htmlPath = __DIR__ . '/../assets/file_markdown.html';
$htmlConverter = new core\HtmlConverter();

// Configure feature options of Pandoc commands
$featuresArr = array(core\Features::STANDALONE);

// Do converting jobs
$htmlConverter->convertAsFile(core\FormatInput::$FI_markdown, $markdownPath, $htmlPath, $featuresArr);

```