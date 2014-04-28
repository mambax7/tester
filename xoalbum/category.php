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

include_once 'header.php';
$xoopsOption['template_main'] = 'xoalbum_category.tpl';
include_once XOOPS_ROOT_PATH . '/header.php';
$start = xoalbum_CleanVars( $_REQUEST, 'start', 0);
// Define Stylesheet
$xoTheme->addStylesheet( $style );
// Get Handler
$categoryHandler =& xoops_getModuleHandler('category', $dirname);
$categoryPaginationLimit = $xoopsModuleConfig['userpager'];

$criteria = new CriteriaCompo();

$criteria->setOrder("DESC");
$criteria->setLimit($categoryPaginationLimit);
$criteria->setStart($start);


$categoryCount = $categoryHandler->getCount($criteria);
$category_arr = $categoryHandler->getAll($criteria);
if ($categoryCount > 0) {
    foreach (array_keys($category_arr) as $i) {
		$category['category_id'] = $category_arr[$i]->getVar('category_id');
		$category['category_name'] = $category_arr[$i]->getVar('category_name');
		$category['category_total'] = $category_arr[$i]->getVar('category_total');
		$category['category_order'] = $category_arr[$i]->getVar('category_order');
		$category['category_dateline'] = $category_arr[$i]->getVar('category_dateline');
		$GLOBALS['xoopsTpl']->append('category', $category);
        $keywords[] = $category_arr[$i]->getVar('category_name');
        unset($category);
    }
    // Display Navigation
    if ($categoryCount > $categoryPaginationLimit) {
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new XoopsPageNav($categoryCount, $categoryPaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }
}
//keywords
if (isset($keywords)) {
xoalbum_meta_keywords(xoops_getModuleOption('keywords', $dirname) .', '. implode(', ', $keywords));
}
//description
xoalbum_meta_description(_MA_XOALBUM_CATEGORY_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', XOALBUM_URL . '/category.php');
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
