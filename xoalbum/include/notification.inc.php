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
 * @version         $Id: 2.10 notification.inc.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */



// comment callback functions
function xoalbum_notify_iteminfo($category, $item_id)
    {
    global $xoopsModule, $xoopsModuleConfig, $xoopsConfig;

    if (empty($xoopsModule) || $xoopsModule->getVar('dirname') != 'xoalbum') {
        $module_handler =& xoops_gethandler('module');
        $module =& $module_handler->getByDirname('xoalbum');
        $config_handler =& xoops_gethandler('config');
        $config =& $config_handler->getConfigsByCat(0,$module->getVar('mid'));
        } else {
        $module =& $xoopsModule;
        $config =& $xoopsModuleConfig;
        }

    xoops_loadLanguage('main', 'xoalbum');

    if ($category=='global') {
        $item['name'] = '';
        $item['url'] = '';

        return $item;
        }

    global $xoopsDB;
    if ($category=='category') {
        // Assume we have a valid category id
        $sql = 'SELECT _title FROM ' . $xoopsDB->prefix('xoalbum_cat') . ' WHERE _cid = '.$item_id;
        $result = $xoopsDB->query($sql); // TODO: error check
        $result_array = $xoopsDB->fetchArray($result);
        $item['name'] = $result_array['_title'];
        $item['url'] = XOOPS_URL . '/modules/' . $module->getVar('dirname') . '/cat_view.php?_cid=' . $item_id;

        return $item;
        }

    if ($category=='') {
        // Assume we have a valid link id
        $sql = 'SELECT _cid, _title FROM '.$xoopsDB->prefix('xoalbum_picture') . ' WHERE _lid = ' . $item_id;
        $result = $xoopsDB->query($sql); // TODO: error check
        $result_array = $xoopsDB->fetchArray($result);
        $item['name'] = $result_array['title'];
        $item['url'] = XOOPS_URL . '/modules/' . $module->getVar('dirname') . '/xoalbum_visit.php?_cid=' . $result_array['_cid'] . '&amp;_lid=' . $item_id;

        return $item;
        }
        return null;
    }
