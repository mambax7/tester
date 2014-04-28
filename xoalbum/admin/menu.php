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
 * @version         $Id: 2.10 menu.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */
$dirname = basename(dirname(dirname(__FILE__))) ;
$module_handler =& xoops_gethandler('module');
$xoopsModule =& XoopsModule::getByDirname($dirname);
$moduleInfo =& $module_handler->get($xoopsModule->getVar('mid'));
$pathIcon32 = '../../' . $moduleInfo->getInfo('sysicons32');
$adminmenu = array();
$i = 1;
$adminmenu[$i]['title'] = _MI_XOALBUM_ADMENU1;
$adminmenu[$i]['link'] = 'admin/index.php';
$adminmenu[$i]['icon'] = $pathIcon32.'/home.png';
++$i;
$adminmenu[$i]['title'] = _MI_XOALBUM_ADMENU2;
$adminmenu[$i]['link'] = 'admin/album.php';
$adminmenu[$i]['icon'] = $pathIcon32.'/photo.png';
++$i;
$adminmenu[$i]['title'] = _MI_XOALBUM_ADMENU3;
$adminmenu[$i]['link'] = 'admin/grid.php';
$adminmenu[$i]['icon'] = $pathIcon32.'/index.png';
++$i;
$adminmenu[$i]['title'] = _MI_XOALBUM_ADMENU4;
$adminmenu[$i]['link'] = 'admin/category.php';
$adminmenu[$i]['icon'] = $pathIcon32.'/category.png';
++$i;
$adminmenu[$i]['title'] = _MI_XOALBUM_ADMENU5;
$adminmenu[$i]['link'] = 'admin/picture.php';
$adminmenu[$i]['icon'] = $pathIcon32.'/metagen.png';
++$i;
$adminmenu[$i]['title'] = _MI_XOALBUM_ADMENU6;
$adminmenu[$i]['link'] = 'admin/permissions.php';
$adminmenu[$i]['icon'] = $pathIcon32.'/permissions.png';
++$i;
$adminmenu[$i]['title'] = _MI_XOALBUM_ADMENU7;
$adminmenu[$i]['link']  = 'admin/about.php';
$adminmenu[$i]['icon'] = $pathIcon32.'/about.png';
unset( $i );
