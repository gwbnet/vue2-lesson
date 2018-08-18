<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU Lesser General Public License version 3 or later.
 */

//---------------------------------------------------------------
/**
* UTF-8 aware alternative to strcspn
* Find length of initial segment not matching mask
* Note: requires utf8_strlen and utf8_substr (if start, length are used)
* @param string
* @return int
* @see http://www.php.net/strcspn
* @package utf8
*/
function utf8_strcspn($str, $mask, $start = NULL, $length = NULL) {

    if ( empty($mask) || strlen($mask) == 0 ) {
        return NULL;
    }

    $mask = preg_replace('!([\\\\\\-\\]\\[/^])!','\\\${1}',$mask);

    if ( $start !== NULL || $length !== NULL ) {
        $str = utf8_substr($str, $start, $length);
    }

    preg_match('/^[^'.$mask.']+/u',$str, $matches);

    if ( isset($matches[0]) ) {
        return utf8_strlen($matches[0]);
    }

    return 0;

}

