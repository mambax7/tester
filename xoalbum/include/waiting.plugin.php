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
 * @version         $Id: 2.10 waiting.plugin.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */
function b_waiting_xoalbum()
{
    $db =& XoopsDatabaseFactory::getDatabaseConnection();
    $ret = array();

    // waiting mod_album
    $block = array();
    $result = $db->query("SELECT COUNT(*) FROM ".$db->prefix('xoalbum_album')." WHERE _waiting = 1");
    if ($result) {
        $block['adminlink'] = XOOPS_URL . "/modules/xoalbum/admin/album.php?op=list_waiting";
        list($block['pendingnum']) = $db->fetchRow($result);
        $block['lang_linkname'] = _MB_XOALBUM_ALBUM_WAITING;
    }
    $ret[] = $block;

    // waiting mod_grid
    $block = array();
    $result = $db->query("SELECT COUNT(*) FROM ".$db->prefix('xoalbum_grid')." WHERE _waiting = 1");
    if ($result) {
        $block['adminlink'] = XOOPS_URL . "/modules/xoalbum/admin/grid.php?op=list_waiting";
        list($block['pendingnum']) = $db->fetchRow($result);
        $block['lang_linkname'] = _MB_XOALBUM_GRID_WAITING;
    }
    $ret[] = $block;

    // waiting mod_category
    $block = array();
    $result = $db->query("SELECT COUNT(*) FROM ".$db->prefix('xoalbum_category')." WHERE _waiting = 1");
    if ($result) {
        $block['adminlink'] = XOOPS_URL . "/modules/xoalbum/admin/category.php?op=list_waiting";
        list($block['pendingnum']) = $db->fetchRow($result);
        $block['lang_linkname'] = _MB_XOALBUM_CATEGORY_WAITING;
    }
    $ret[] = $block;

    // waiting mod_picture
    $block = array();
    $result = $db->query("SELECT COUNT(*) FROM ".$db->prefix('xoalbum_picture')." WHERE _waiting = 1");
    if ($result) {
        $block['adminlink'] = XOOPS_URL . "/modules/xoalbum/admin/picture.php?op=list_waiting";
        list($block['pendingnum']) = $db->fetchRow($result);
        $block['lang_linkname'] = _MB_XOALBUM_PICTURE_WAITING;
    }
    $ret[] = $block;


    return $ret;
};