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

include_once 'admin_header.php';
//count "total Album"
$totalAlbum = $albumHandler->getCount();
//count "total Grid"
$totalGrid = $gridHandler->getCount();
//count "total Category"
$totalCategory = $categoryHandler->getCount();
//count "total Picture"
$totalPicture = $pictureHandler->getCount();
// InfoBox Statistics
$adminMenu->addInfoBox(_AM_XOALBUM_STATISTICS);
// InfoBox album
$adminMenu->addInfoBoxLine(_AM_XOALBUM_STATISTICS, _AM_XOALBUM_THEREARE_ALBUM, $totalAlbum);
// InfoBox grid
$adminMenu->addInfoBoxLine(_AM_XOALBUM_STATISTICS, _AM_XOALBUM_THEREARE_GRID, $totalGrid);
// InfoBox category
$adminMenu->addInfoBoxLine(_AM_XOALBUM_STATISTICS, _AM_XOALBUM_THEREARE_CATEGORY, $totalCategory);
// InfoBox picture
$adminMenu->addInfoBoxLine(_AM_XOALBUM_STATISTICS, _AM_XOALBUM_THEREARE_PICTURE, $totalPicture);
// Render Index
echo $adminMenu->addNavigation('index.php');
echo $adminMenu->renderIndex();
include_once 'admin_footer.php';
