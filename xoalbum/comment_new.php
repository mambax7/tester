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
 * @version         $Id: 2.10 comment_new.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */include '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/modules/xoalbum/class/picture.php';
$com_itemid = isset($_REQUEST['com_itemid']) ? intval($_REQUEST['com_itemid']) : 0;
if ($com_itemid > 0) {
    $pictureHandler =& xoops_getModuleHandler('picture', 'xoalbum');
    $picture = $picturehandler->get($com_itemid);
    $com_replytitle = $picture->getVar('picture_name');
    include XOOPS_ROOT_PATH.'/include/comment_new.php';
}