<?php
/**
 * Copyright (C) 2016 Jerome Chan <jerome.chan369@gmail.com>
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @see http://www.pandoc.org/README.html
 * @see https://github.com/jgm/pandoc/wiki/Pandoc-Extras#pandoc-wrappers-and-interfaces
 */

ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . dirname(dirname(__FILE__)));

require_once 'Autoload.php';

use pandoc_php_wrapper\core;

$result = core\Format::getAllFormatInput();
var_dump(111, $result);

$markdownPath = __DIR__ . '/../assets/file_markdown.md';
$htmlPath = __DIR__ . '/../assets/file_markdown.html';
$htmlConverter = new core\HtmlConverter();
$result = $htmlConverter->convertAsStd(core\FormatInput::$FI_markdown, $markdownPath);
var_dump($result);

$featuresArr = array(core\Features::STANDALONE);
var_dump($featuresArr, 222);
$htmlConverter->convertAsFile(core\FormatInput::$FI_markdown, $markdownPath, $htmlPath, $featuresArr);
