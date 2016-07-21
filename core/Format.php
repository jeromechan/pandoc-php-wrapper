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

/**
 * Class Format
 * Define for placing all the support formats of pandoc.
 *
 * @package pandoc_php_wrapper\core
 */
final class Format
{
    /**
     * get all format_input values
     *
     * @return array
     */
    public static function getAllFormatInput()
    {
        return array_values(get_class_vars(FormatInput::class));
    }

    /**
     * get all format_output values
     * @return array
     */
    public static function getAllFormatOutput()
    {
        return array_values(get_class_vars(FormatOutput::class));
    }
}

/**
 * Class FormatInput
 *
 * @package pandoc_php_wrapper\core
 */
final class FormatInput
{
    public static $FI_markdown = "markdown";
}

/**
 * Class FormatOutput
 *
 * @package pandoc_php_wrapper\core
 */
final class FormatOutput
{
    public static $FI_html = "html";
}