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
use pandoc_php_wrapper\exception;

/**
 * Class Converter
 *
 * @package pandoc_php_wrapper\core
 * @see http://www.pandoc.org/README.html
 */
abstract class Converter
{
    /**
     * pandoc command template for std.
     *
     * @var string
     */
    private $_commandStdTpl = "pandoc -f %s -t %s %s %s";

    /**
     * pandoc command template for file.
     *
     * @var string
     */
    private $_commandFileTpl = "pandoc -f %s -t %s %s -o %s %s";

    /**
     * get command result as string.
     *
     * @param $inputFormat
     * @param $outputFormat
     * @param $inputPath
     * @param array $features
     * @return string
     * @throws exception\PandocCommandException
     */
    public function executeAndGetString($inputFormat, $outputFormat, $inputPath, $features)
    {
        exec($this->generateCommandUsingStdTpl($inputFormat, $outputFormat, $inputPath, $features), $output, $returnVal);
        if ($returnVal === 0) {
            return implode('\n', $output);
        } else {
            throw new exception\PandocCommandException("generate output std fail.");
        }
    }

    /**
     * generate a file for placing the command result.
     *
     * @param $inputFormat
     * @param $outputFormat
     * @param $inputPath
     * @param $outputPath
     * @param array $features
     * @throws exception\PandocCommandException
     */
    public function executeAndGenerateFile($inputFormat, $outputFormat, $inputPath, $outputPath, $features)
    {
        exec($this->generateCommandUsingFileTpl($inputFormat, $outputFormat, $inputPath, $outputPath, $features), $output, $returnVal);
        if ($returnVal !== 0) {
            throw new exception\PandocCommandException("generate output file fail.");
        }
    }

    /**
     * generate command using std tpl
     *
     * @param $inputFormat
     * @param $outputFormat
     * @param $inputPath
     * @param $features
     * @return string
     * @throws exception\FormatException
     */
    public function generateCommandUsingStdTpl($inputFormat, $outputFormat, $inputPath, $features)
    {
        if (!in_array($inputFormat, Format::getAllFormatInput())) {
            throw new exception\FormatException("input format unavailable currently.");
        }

        if (!in_array($outputFormat, Format::getAllFormatOutput())) {
            throw new exception\FormatException("output format unavailable currently.");
        }

        return sprintf($this->_commandStdTpl, $inputFormat, $outputFormat, $inputPath,
            $this->_getCommandFeaturesString($features));
    }

    /**
     * generate command using file tpl
     *
     * @param $inputFormat
     * @param $outputFormat
     * @param $inputPath
     * @param $outputPath
     * @param $features
     * @return string
     * @throws exception\FormatException
     */
    public function generateCommandUsingFileTpl($inputFormat, $outputFormat, $inputPath, $outputPath, $features)
    {
        if (!in_array($inputFormat, Format::getAllFormatInput())) {
            throw new exception\FormatException("input format unavailable currently.");
        }

        if (!in_array($outputFormat, Format::getAllFormatOutput())) {
            throw new exception\FormatException("output format unavailable currently.");
        }

        return sprintf($this->_commandFileTpl, $inputFormat, $outputFormat, $inputPath, $outputPath,
            $this->_getCommandFeaturesString($features));
    }

    /**
     * get features string of pandoc command.
     *
     * @param $features
     * @return string
     */
    private function _getCommandFeaturesString($features)
    {
        if (empty($features) || !is_array($features)) {
            return '';
        }
        return implode(' ', $features);
    }
}