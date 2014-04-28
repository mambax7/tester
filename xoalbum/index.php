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
 * @version         $Id: 2.10 index.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

include_once 'header.php';
$xoopsOption['template_main'] = 'xoalbum_index.tpl';
include_once XOOPS_ROOT_PATH.'/header.php';
// Define Stylesheet
$xoTheme->addStylesheet( $style );
// keywords
xoalbum_meta_keywords(xoops_getModuleOption('keywords', $dirname));
// description
xoalbum_meta_description(_MA_XOALBUM_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', XOALBUM_URL.'/index.php');
$GLOBALS['xoopsTpl']->assign('xoalbum_url', XOALBUM_URL);
$GLOBALS['xoopsTpl']->assign('adv', xoops_getModuleOption('advertise', $dirname));
//
$GLOBALS['xoopsTpl']->assign('bookmarks', xoops_getModuleOption('bookmarks', $dirname));
$GLOBALS['xoopsTpl']->assign('fbcomments', xoops_getModuleOption('fbcomments', $dirname));
//
$GLOBALS['xoopsTpl']->assign('admin', _MA_XOALBUM_ADMIN);
$GLOBALS['xoopsTpl']->assign('copyright', $copyright);
//
include_once XOOPS_ROOT_PATH.'/footer.php';
