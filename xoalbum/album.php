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

include_once 'header.php';
$xoopsOption['template_main'] = 'xoalbum_album.tpl';
include_once XOOPS_ROOT_PATH . '/header.php';
$start = xoalbum_CleanVars( $_REQUEST, 'start', 0);
// Define Stylesheet
$xoTheme->addStylesheet( $style );
// Get Handler
$albumHandler =& xoops_getModuleHandler('album', $dirname);
$albumPaginationLimit = $xoopsModuleConfig['userpager'];

$criteria = new CriteriaCompo();

$criteria->setOrder("DESC");
$criteria->setLimit($albumPaginationLimit);
$criteria->setStart($start);


$albumCount = $albumHandler->getCount($criteria);
$album_arr = $albumHandler->getAll($criteria);
if ($albumCount > 0) {
    foreach (array_keys($album_arr) as $i) {
		$album['album_id'] = $album_arr[$i]->getVar('album_id');
$categoryHandler =& xoops_getModuleHandler('category', $dirname);        
 $album['category_id'] = $categoryHandler->get($album_arr[$i]->getVar("category_id"))->getVar('category_name');
		$album['album_uid'] = $album_arr[$i]->getVar('album_uid');
		$album['album_name'] = $album_arr[$i]->getVar('album_name');
		$album['album_desc'] = strip_tags($album_arr[$i]->getVar('album_desc'));
		$album['album_total'] = $album_arr[$i]->getVar('album_total');
		$album['album_cover'] = $album_arr[$i]->getVar('album_cover');
		$album['album_views'] = $album_arr[$i]->getVar('album_views');
		$album['album_status'] = $album_arr[$i]->getVar('album_status');
		$album['album_dateline'] = $album_arr[$i]->getVar('album_dateline');
		$GLOBALS['xoopsTpl']->append('album', $album);
        $keywords[] = $album_arr[$i]->getVar('album_name');
        unset($album);
    }
    // Display Navigation
    if ($albumCount > $albumPaginationLimit) {
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new XoopsPageNav($albumCount, $albumPaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }
}
//keywords
if (isset($keywords)) {
xoalbum_meta_keywords(xoops_getModuleOption('keywords', $dirname) .', '. implode(', ', $keywords));
}
//description
xoalbum_meta_description(_MA_XOALBUM_ALBUM_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', XOALBUM_URL . '/album.php');
$GLOBALS['xoopsTpl']->assign('xoalbum_url', XOALBUM_URL);
$GLOBALS['xoopsTpl']->assign('adv', xoops_getModuleOption('advertise', $dirname));
//
$GLOBALS['xoopsTpl']->assign('bookmarks', xoops_getModuleOption('bookmarks', $dirname));
$GLOBALS['xoopsTpl']->assign('fbcomments', xoops_getModuleOption('fbcomments', $dirname));
//
$GLOBALS['xoopsTpl']->assign('admin', _MA_XOALBUM_ADMIN);
$GLOBALS['xoopsTpl']->assign('copyright', $copyright);
//
include_once XOOPS_ROOT_PATH . '/footer.php';
