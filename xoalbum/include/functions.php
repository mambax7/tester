<?php

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
/**
 * xoalbum module for xoops
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GPL 2.0 or later
 * @package         xoalbum
 * @since           2.0.0
 * @author          XOOPS Development Team <name@site.com> - <http://xoops.org>
 * @version         $Id: 2.10 functions.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

/***************Blocks***************/
function xoalbum_block_addCatSelect($cats) {
    if (is_array($cats)) {
        $cat_sql = '('.current($cats);
        array_shift($cats);
        foreach ($cats as $cat) {
            $cat_sql .= ','.$cat;
        }
        $cat_sql .= ')';
    }

    return $cat_sql;
}

/**
 * @param        $global
 * @param        $key
 * @param string $default
 * @param string $type
 *
 * @return mixed|string
 */
function xoalbum_CleanVars( &$global, $key, $default = '', $type = 'int' ) {
    switch ($type) {
        case 'string':
            $ret = ( isset( $global[$key] ) ) ? filter_var( $global[$key], FILTER_SANITIZE_MAGIC_QUOTES ) : $default;
            break;
        case 'int': default:
            $ret = ( isset( $global[$key] ) ) ? filter_var( $global[$key], FILTER_SANITIZE_NUMBER_INT ) : $default;
            break;
    }
    if ($ret === false) {
        return $default;
    }

    return $ret;
}

/**
 * @param $content
 */
function xoalbum_meta_keywords($content)
{
    global $xoopsTpl, $xoTheme;
    $myts = MyTextSanitizer::getInstance();
    $content= $myts->undoHtmlSpecialChars($myts->displayTarea($content));
    if (isset($xoTheme) && is_object($xoTheme)) {
        $xoTheme->addMeta( 'meta', 'keywords', strip_tags($content));
    } else {    // Compatibility for old Xoops versions
        $xoopsTpl->assign('xoops_meta_keywords', strip_tags($content));
    }
}

/**
 * @param $content
 */
function xoalbum_meta_description($content)
{
    global $xoopsTpl, $xoTheme;
    $myts = MyTextSanitizer::getInstance();
    $content = $myts->undoHtmlSpecialChars($myts->displayTarea($content));
    if (isset($xoTheme) && is_object($xoTheme)) {
        $xoTheme->addMeta( 'meta', 'description', strip_tags($content));
    } else {    // Compatibility for old Xoops versions
        $xoopsTpl->assign('xoops_meta_description', strip_tags($content));
    }
}

/**
 * @param $tableName
 * @param $columnName
 *
 * @return array
 */
function xoalbum_enumerate($tableName,$columnName) {
    global $xoopsDB;
    $table = $xoopsDB->prefix($tableName);

    $result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_NAME = '$table' AND COLUMN_NAME = '$columnName'")
    or die (mysql_error());

    $row = mysql_fetch_array($result);
    $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));
    return $enumList;
}

/**
 * @param $tableName
 * @param $id_field
 * @param $id
 *
 * @return mixed
 */
function xoalbum_cloneRecord($tableName, $id_field, $id)
{
    global $xoopsDB;
    $table = $xoopsDB->prefix($tableName);
    // copy content of the record you wish to clone 
    $tempTable = $xoopsDB->fetchArray($xoopsDB->query("SELECT * FROM $table WHERE $id_field='$id' "), MYSQL_ASSOC) or die("Could not select record");
// set the auto-incremented id's value to blank.
    unset($tempTable[$id_field]);
    // insert cloned copy of the original  record 
    $result = $xoopsDB->queryF("INSERT INTO $table (" . implode(", ", array_keys($tempTable)) . ") VALUES ('" . implode("', '", array_values($tempTable)) . "')") or die (mysql_error());

    // Return the new id
    $new_id = $xoopsDB->getInsertId();
    return $new_id;
}

