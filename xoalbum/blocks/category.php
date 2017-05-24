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
 * @version         $Id: 2.10 category.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

include_once dirname(dirname(__FILE__)) . '/include/functions.php';
/**
 * @param $options
 *
 * @return array
 */
function b_xoalbum_category_show($options)
{
    include_once dirname(dirname(__FILE__)) . '/class/category.php';
    $dirname = basename(dirname(dirname(__FILE__)));
    $myts = MyTextSanitizer::getInstance();

    $category = array();
    $type_block = $options[0];
    $nb_category = $options[1];
    $lenght_title = $options[2];

    $categoryHandler =& xoops_getModuleHandler('category', $dirname);
    $criteria = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);    
	if ($type_block)
    {
        $criteria->add(new Criteria('category_id', 0, '!='));
        $criteria->setSort('category_id');
        $criteria->setOrder('ASC');
    }

    $criteria->setLimit($nb_category);
    $category_arr = $categoryHandler->getAll($criteria);
    foreach (array_keys($category_arr) as $i) {    
	}

    return $category;
}
/**
 * @param $options
 *
 * @return string
 */
function b_xoalbum_category_edit($options)
{
   include_once dirname(dirname(__FILE__)) . '/class/category.php';
    $dirname = basename(dirname(dirname(__FILE__)));

    $form = _MB_XOALBUM_DISPLAY;
    $form .= "<input type='hidden' name='options[0]' value='".$options[0]."' />";
    $form .= "<input name='options[1]' size='5' maxlength='255' value='".$options[1]."' type='text' />&nbsp;<br />";
    $form .= _MB_XOALBUM_TITLELENGTH." : <input name='options[2]' size='5' maxlength='255' value='".$options[2]."' type='text' /><br /><br />";
    $categoryHandler =& xoops_getModuleHandler('category', $dirname);
    $criteria = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    $criteria->add(new Criteria('category_id', 0, '!='));
    $criteria->setSort('category_id');
    $criteria->setOrder('ASC');
    $category_arr = $categoryHandler->getAll($criteria);
    $form .= _MB_XOALBUM_CATTODISPLAY."<br /><select name='options[]' multiple='multiple' size='5'>";
    $form .= "<option value='0' " . (array_search(0, $options) === false ? "" : "selected='selected'") . ">" ._MB_XOALBUM_ALLCAT . "</option>";
    foreach (array_keys($category_arr) as $i) {
        $category_id = $category_arr[$i]->getVar('category_id');
        $form .= "<option value='" . $category_id . "' " . (array_search($category_id, $options) === false ? "" : "selected='selected'") . ">".$category_arr[$i]->getVar('category_name')."</option>";
    }
    $form .= "</select>";

    return $form;
}
