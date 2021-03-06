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

namespace pandoc_php_wrapper\core;

class HtmlConverter extends Converter implements IConverter
{
    /**
     * HtmlConverter constructor.
     */
    public function __construct()
    {
    }

    /**
     * HtmlConverter destructor
     */
    public function __destruct()
    {
    }

    /**
     * The core converter implementation.
     *
     * @param $inputFormat
     * @param $inputPath
     * @param $outputPath
     * @param array $features
     * @return mixed
     */
    function convertAsFile($inputFormat, $inputPath, $outputPath, $features = array())
    {
        $this->executeAndGenerateFile($inputFormat, FormatOutput::$FI_html, $inputPath, $outputPath, $features);
    }

    /**
     * The core converter implementation.
     *
     * @param $inputFormat
     * @param $inputPath
     * @param array $features
     * @return mixed
     */
    function convertAsStd($inputFormat, $inputPath, $features = array())
    {
        $result = $this->executeAndGetString($inputFormat, FormatOutput::$FI_html, $inputPath, $features);
        return $result;
    }

}