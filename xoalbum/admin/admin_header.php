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
 * @version         $Id: 2.10 admin_header.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

require_once dirname(dirname(dirname(dirname(__FILE__)))). '/include/cp_header.php';
$dirPath = dirname(dirname(__FILE__));
include_once $dirPath.'/include/common.php';
include_once $dirPath.'/include/functions.php';
include_once $dirPath.'/class/helper.php';
// Get instance
$xoalbumHelper = XoalbumHelper::getInstance();

$thisModule = $GLOBALS['xoopsModule']->getVar('dirname');

$sysPathIcon16 = XOOPS_URL . '/' .  $xoopsModule->getInfo('sysicons16');
$sysPathIcon32 = XOOPS_URL . '/' .  $xoopsModule->getInfo('sysicons32');
$pathModuleAdmin = $GLOBALS['xoopsModule']->getInfo('dirmoduleadmin');

$modPathIcon16 = $xoopsModule->getInfo('modicons16');
$modPathIcon32 = $xoopsModule->getInfo('modicons32');
$albumHandler =& xoops_getModuleHandler('album', $thisModule);
$gridHandler =& xoops_getModuleHandler('grid', $thisModule);
$categoryHandler =& xoops_getModuleHandler('category', $thisModule);
$pictureHandler =& xoops_getModuleHandler('picture', $thisModule);


$myts =& MyTextSanitizer::getInstance();
if (!isset($xoopsTpl) || !is_object($xoopsTpl)) {
    include_once(XOOPS_ROOT_PATH."/class/template.php");
    $xoopsTpl = new XoopsTpl();
}
// System icons path
$xoopsTpl->assign('sysPathIcon16', $sysPathIcon16);
$xoopsTpl->assign('sysPathIcon32', $sysPathIcon32);
// Local icons path
$xoopsTpl->assign('modPathIcon16', $modPathIcon16);
$xoopsTpl->assign('modPathIcon32', $modPathIcon32);

//Load languages
xoops_loadLanguage('admin', $thisModule);
xoops_loadLanguage('modinfo', $thisModule);
xoops_loadLanguage('main', $thisModule);
// Local admin menu class
if ( file_exists($GLOBALS['xoops']->path($pathModuleAdmin.'/moduleadmin.php'))) {
    include_once $GLOBALS['xoops']->path($pathModuleAdmin.'/moduleadmin.php');
} else {
    redirect_header("../../../admin.php", 5, _AM_MODULEADMIN_MISSING, false);
}
xoops_cp_header();
$adminMenu = new ModuleAdmin();
