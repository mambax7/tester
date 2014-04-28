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
 * @version         $Id: 2.10 install.php 11532 Mon 2014/04/28 11:10:05Z XOOPS Development Team $
 */

$indexFile = XOOPS_UPLOAD_PATH.'/index.html';
$blankFile = XOOPS_UPLOAD_PATH.'/blank.gif';

// Making of "uploads" folder
$xoalbum = XOOPS_UPLOAD_PATH.'/xoalbum';
if(!is_dir($xoalbum))
    mkdir($xoalbum, 0777);
    chmod($xoalbum, 0777);
copy($indexFile, $xoalbum.'/index.html');
// Making of album uploads folder
$album = $xoalbum.'/album';
if(!is_dir($album))
    mkdir($album, 0777);
    chmod($album, 0777);
copy($indexFile, $album.'/index.html');
// Making of grid uploads folder
$grid = $xoalbum.'/grid';
if(!is_dir($grid))
    mkdir($grid, 0777);
    chmod($grid, 0777);
copy($indexFile, $grid.'/index.html');
// Making of category uploads folder
$category = $xoalbum.'/category';
if(!is_dir($category))
    mkdir($category, 0777);
    chmod($category, 0777);
copy($indexFile, $category.'/index.html');
// Making of picture uploads folder
$picture = $xoalbum.'/picture';
if(!is_dir($picture))
    mkdir($picture, 0777);
    chmod($picture, 0777);
copy($indexFile, $picture.'/index.html');