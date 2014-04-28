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
 * @version         $Id: 2.10 picture.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

include_once 'header.php';
$xoopsOption['template_main'] = 'xoalbum_picture.tpl';
include_once XOOPS_ROOT_PATH . '/header.php';
$start = xoalbum_CleanVars( $_REQUEST, 'start', 0);
// Define Stylesheet
$xoTheme->addStylesheet( $style );
// Get Handler
$pictureHandler =& xoops_getModuleHandler('picture', $dirname);
$picturePaginationLimit = $xoopsModuleConfig['userpager'];

$criteria = new CriteriaCompo();

$criteria->setOrder("DESC");
$criteria->setLimit($picturePaginationLimit);
$criteria->setStart($start);


$pictureCount = $pictureHandler->getCount($criteria);
$picture_arr = $pictureHandler->getAll($criteria);
if ($pictureCount > 0) {
    foreach (array_keys($picture_arr) as $i) {
		$picture['picture_id'] = $picture_arr[$i]->getVar('picture_id');
		$picture['picture_uid'] = $picture_arr[$i]->getVar('picture_uid');
$albumHandler =& xoops_getModuleHandler('album', $dirname);        
 $picture['album_id'] = $albumHandler->get($picture_arr[$i]->getVar("album_id"))->getVar('album_name');
		$picture['picture_name'] = $picture_arr[$i]->getVar('picture_name');
		$picture['picture_desc'] = strip_tags($picture_arr[$i]->getVar('picture_desc'));
		$picture['picture_filename'] = $picture_arr[$i]->getVar('picture_filename');
		$picture['picture_filetype'] = $picture_arr[$i]->getVar('picture_filetype');
		$picture['picture_thumbfirst'] = $picture_arr[$i]->getVar('picture_thumbfirst');
		$picture['picture_thumbsecond'] = $picture_arr[$i]->getVar('picture_thumbsecond');
		$picture['picture_size'] = $picture_arr[$i]->getVar('picture_size');
		$picture['picture_dateline'] = $picture_arr[$i]->getVar('picture_dateline');
		$picture['picture_comments'] = $picture_arr[$i]->getVar('picture_comments');
		$picture['picture_downloads'] = $picture_arr[$i]->getVar('picture_downloads');
		$GLOBALS['xoopsTpl']->append('picture', $picture);
        $keywords[] = $picture_arr[$i]->getVar('picture_name');
        unset($picture);
    }
    // Display Navigation
    if ($pictureCount > $picturePaginationLimit) {
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new XoopsPageNav($pictureCount, $picturePaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }
}
//keywords
if (isset($keywords)) {
xoalbum_meta_keywords(xoops_getModuleOption('keywords', $dirname) .', '. implode(', ', $keywords));
}
//description
xoalbum_meta_description(_MA_XOALBUM_PICTURE_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', XOALBUM_URL . '/picture.php');
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
