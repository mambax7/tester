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
 * @version         $Id: 2.10 grid.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

include_once 'header.php';
$xoopsOption['template_main'] = 'xoalbum_grid.tpl';
include_once XOOPS_ROOT_PATH . '/header.php';
$start = xoalbum_CleanVars( $_REQUEST, 'start', 0);
// Define Stylesheet
$xoTheme->addStylesheet( $style );
// Get Handler
$gridHandler =& xoops_getModuleHandler('grid', $dirname);
$gridPaginationLimit = $xoopsModuleConfig['userpager'];

$criteria = new CriteriaCompo();

$criteria->setOrder("DESC");
$criteria->setLimit($gridPaginationLimit);
$criteria->setStart($start);


$gridCount = $gridHandler->getCount($criteria);
$grid_arr = $gridHandler->getAll($criteria);
if ($gridCount > 0) {
    foreach (array_keys($grid_arr) as $i) {
		$grid['grid_id'] = $grid_arr[$i]->getVar('grid_id');
		$grid['grid_uid'] = $grid_arr[$i]->getVar('grid_uid');
$pictureHandler =& xoops_getModuleHandler('picture', $dirname);        
 $grid['picture_id'] = $pictureHandler->get($grid_arr[$i]->getVar("picture_id"))->getVar('picture_name');
		$grid['grid_title'] = $grid_arr[$i]->getVar('grid_title');
		$grid['grid_data'] = $grid_arr[$i]->getVar('grid_data');
		$grid['grid_date'] = $grid_arr[$i]->getVar('grid_date');
		$GLOBALS['xoopsTpl']->append('grid', $grid);
        $keywords[] = $grid_arr[$i]->getVar('grid_id');
        unset($grid);
    }
    // Display Navigation
    if ($gridCount > $gridPaginationLimit) {
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new XoopsPageNav($gridCount, $gridPaginationLimit, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
    }
}
//keywords
if (isset($keywords)) {
xoalbum_meta_keywords(xoops_getModuleOption('keywords', $dirname) .', '. implode(', ', $keywords));
}
//description
xoalbum_meta_description(_MA_XOALBUM_GRID_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', XOALBUM_URL . '/grid.php');
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
