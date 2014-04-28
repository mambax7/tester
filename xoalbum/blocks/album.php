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
 * @version         $Id: 2.10 album.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

include_once dirname(dirname(__FILE__)) . '/include/functions.php';
/**
 * @param $options
 *
 * @return array
 */
function b_xoalbum_album_show($options)
{
    include_once dirname(dirname(__FILE__)) . '/class/album.php';
    $dirname = basename(dirname(dirname(__FILE__)));
    $myts =& MyTextSanitizer::getInstance();

    $album = array();
    $type_block = $options[0];
    $nb_album = $options[1];
    $lenght_title = $options[2];

    $albumHandler =& xoops_getModuleHandler('album', $dirname);
    $criteria = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);    
	if ($type_block)
    {
        $criteria->add(new Criteria('album_id', 0, '!='));
        $criteria->setSort('album_id');
        $criteria->setOrder('ASC');
    }

    $criteria->setLimit($nb_album);
    $album_arr = $albumHandler->getAll($criteria);
    foreach (array_keys($album_arr) as $i) {    
	}

    return $album;
}
/**
 * @param $options
 *
 * @return string
 */
function b_xoalbum_album_edit($options)
{
   include_once dirname(dirname(__FILE__)) . '/class/album.php';
    $dirname = basename(dirname(dirname(__FILE__)));

    $form = _MB_XOALBUM_DISPLAY;
    $form .= "<input type='hidden' name='options[0]' value='".$options[0]."' />";
    $form .= "<input name='options[1]' size='5' maxlength='255' value='".$options[1]."' type='text' />&nbsp;<br />";
    $form .= _MB_XOALBUM_TITLELENGTH." : <input name='options[2]' size='5' maxlength='255' value='".$options[2]."' type='text' /><br /><br />";
    $albumHandler =& xoops_getModuleHandler('album', $dirname);
    $criteria = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    $criteria->add(new Criteria('album_id', 0, '!='));
    $criteria->setSort('album_id');
    $criteria->setOrder('ASC');
    $album_arr = $albumHandler->getAll($criteria);
    $form .= _MB_XOALBUM_CATTODISPLAY."<br /><select name='options[]' multiple='multiple' size='5'>";
    $form .= "<option value='0' " . (array_search(0, $options) === false ? "" : "selected='selected'") . ">" ._MB_XOALBUM_ALLCAT . "</option>";
    foreach (array_keys($album_arr) as $i) {
        $album_id = $album_arr[$i]->getVar('album_id');
        $form .= "<option value='" . $album_id . "' " . (array_search($album_id, $options) === false ? "" : "selected='selected'") . ">".$album_arr[$i]->getVar('album_name')."</option>";
    }
    $form .= "</select>";

    return $form;
}
