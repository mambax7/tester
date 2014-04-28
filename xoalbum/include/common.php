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
 * @version         $Id: 2.10 common.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */
if (! defined( "XOOPS_ROOT_PATH")) exit ;
if (!defined('XOALBUM_MODULE_PATH')) {
    define('XOALBUM_DIRNAME', basename(dirname(dirname(__FILE__))));
    define('XOALBUM_URL', XOOPS_URL.'/modules/'.XOALBUM_DIRNAME);
    define('XOALBUM_IMAGE_URL', XOALBUM_URL.'/assets/images/');
    define('XOALBUM_ROOT_PATH', XOOPS_ROOT_PATH.'/modules/'.XOALBUM_DIRNAME);
    define('XOALBUM_IMAGE_PATH', XOALBUM_ROOT_PATH.'/assets/images');
    define('XOALBUM_ADMIN_URL', XOALBUM_URL .'/admin/');
    define('XOALBUM_UPLOAD_URL', XOOPS_UPLOAD_URL.'/'.XOALBUM_DIRNAME);
    define('XOALBUM_UPLOAD_PATH', XOOPS_UPLOAD_PATH.'/'.XOALBUM_DIRNAME);

xoops_loadLanguage('common', XOALBUM_DIRNAME);

include_once XOALBUM_ROOT_PATH . '/include/functions.php';
//include_once XOALBUM_ROOT_PATH . '/include/constants.php';
//include_once XOALBUM_ROOT_PATH . '/include/seo_functions.php';
//include_once XOALBUM_ROOT_PATH . '/class/metagen.php';
//include_once XOALBUM_ROOT_PATH . '/class/session.php';
include_once XOALBUM_ROOT_PATH . '/class/xoalbum.php';
include_once XOALBUM_ROOT_PATH . '/class/request.php';


$debug = false;
$xoalbum = XoalbumXoalbum::getInstance($debug);


    $local_logo = XOALBUM_IMAGE_URL . '/xoopsproject_logo.png';
    if (is_dir(XOALBUM_IMAGE_PATH) && file_exists($local_logo)) {
        $logo = $local_logo;
    } else {
        $pathIcon32 = $xoopsModule->getInfo('icons32');
        $logo = $pathIcon32.'/xoopsmicrobutton.gif';
    }
    define('XOALBUM_AUTHOR_LOGOIMG', $logo);
}
// module information
$copyright = "<a href='http://xoops.org' title='XOOPS Project' target='_blank'>
                     <img src='".XOALBUM_AUTHOR_LOGOIMG."' alt='XOOPS Project' /></a>";

